<?php

App::uses('StatsAppModel', 'Stats.Model');

class StatReportPlan extends StatsAppModel {
	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = 'StatReportPlan';

	/**
	 * Behaviors
	 *
	 * @var array
	 * @access public
	 */

	/**
	 * Validation parameters - initialized in constructor
	 *
	 * @var array
	 * @access public
	 */
	public $validate = array();

	/**
	 * Search.Searchable filter args, controls parseCriteria()
	 *
	 * @link https://github.com/CakeDC/search
	 */
	public $filterArgs = array(
		array('name' => 'q', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportPlan.id'),
		array('name' => 'term', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportPlan.id'),
		array('name' => 'type', 'type' => 'query', 'method' => 'searchType'),
		array('name' => 'site_id', 'type' => 'value', 'field' => 'StatReportPlan.site_id'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'StatReportPlan.created BETWEEN ? AND ?'),
	);

	/**
	 * belongsTo association
	 *
	 * @var array $belongsTo
	 * @access public
	 */
	public $belongsTo = array(
		'Join' => array(
			'className' => 'Join',
			'foreignKey' => 'join_id',
		)
	);

	/**
	 * hasMany association
	 *
	 * @var array $hasMany
	 * @access public
	 */
	public $hasMany = array(
		'StatReport' => array(
			'className' => 'Stats.StatReport',
			'foreignKey' => 'stat_report_plan_id',
			'dependent' => false,
		)
	);

	/**
	 * HABTM association
	 *
	 * @var array $hasAndBelongsToMany
	 * @access public
	 */

	public $hasAndBelongsToMany = array(
		'StatReportMetric' => array(
			'className' => 'Stats.StatReportMetric',
			'joinTable' => 'stat_report_metrics_stat_report_plans',
			'foreignKey' => 'stat_report_plan_id',
			'associationForeignKey' => 'stat_report_metric_id',
			'unique' => true,
			'with' => 'Stats.StatReportMetricsStatReportPlan',
		)
	);

	/**
	 * Constructor
	 *
	 * @param mixed $id Model ID
	 * @param string $table Table name
	 * @param string $ds Datasource
	 * @access public
	 */
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'name' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'required' => 'create',
					'allowEmpty' => false,
					'message' => __('Please enter a Name', true)
				),
			),
		);
	}

	/**
	 * Adds a new record to the database
	 *
	 * @param array post data, should be Contoller->data
	 * @return array
	 * @access public
	 */
	public function add($data = null) {
		if (!empty($data)) {
			$this->create();
			$result = $this->save($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			}
			throw new OutOfBoundsException(__('Could not save the statReportPlan, please check your inputs.', true));
		}
	}

	/**
	 * Edits an existing Stat Report Plan.
	 *
	 * @param string $id, stat report plan id
	 * @param array $data, controller post data usually $this->data
	 * @return mixed True on successfully save else merged (initial + post) data as array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function edit($id = null, $data = null) {
		$statReportPlan = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
			)
		));
		if (empty($statReportPlan)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Plan', true));
		}
		$this->set($statReportPlan);
		if (empty($data)) {
			// no data submitted
			return $statReportPlan;
		}
		// data submitted | posted
		$merged = Hash::merge($statReportPlan, $data);
		$this->set($data);
		$result = $this->save(null, true);
		// model data should be as complete as possible after edit
		$this->data = Hash::merge($merged, $this->data);
		if (empty($result)) {
			// save failed...
			return $merged;
		}
		// save success
		return true;
	}

	/**
	 * Returns the record of a Stat Report Plan.
	 *
	 * @param string $id, stat report plan id
	 * @return array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function view($id = null) {
		$statReportPlan = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id			)
		));
		if (empty($statReportPlan)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Plan', true));
		}
		return $statReportPlan;
	}

	/**
	 * Validates the deletion
	 *
	 * @param string $id, stat report plan id
	 * @param array $data, controller post data usually $this->data
	 * @return boolean True on success
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function validateAndDelete($id = null, $data = array()) {
		$statReportPlan = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
			)
		));
		if (empty($statReportPlan)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Plan', true));
		}
		$this->data['statReportPlan'] = $statReportPlan;
		if (!empty($data)) {
			$data['StatReportPlan']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));
			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['StatReportPlan']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Stat Report Plan', true));
		}
	}


}
