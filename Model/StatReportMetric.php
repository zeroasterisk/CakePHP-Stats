<?php

App::uses('StatsAppModel', 'Stats.Model');

class StatReportMetric extends StatsAppModel {
	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = 'StatReportMetric';

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
		array('name' => 'q', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportMetric.id'),
		array('name' => 'term', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportMetric.id'),
		array('name' => 'type', 'type' => 'query', 'method' => 'searchType'),
		array('name' => 'site_id', 'type' => 'value', 'field' => 'StatReportMetric.site_id'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'StatReportMetric.created BETWEEN ? AND ?'),
	);

	/**
	 * hasMany association
	 *
	 * @var array $hasMany
	 * @access public
	 */

	public $hasMany = array(
		'StatReportValue' => array(
			'className' => 'StatReportValue',
			'foreignKey' => 'stat_report_metric_id',
			'dependent' => false,
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
				'isUnique' => array(
					'rule' => array('isUnique', 1),
					'required' => false,
					'allowEmpty' => false,
					'message' => __('The Name and must be unique', true)
				)
			),
			'abbr' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'required' => 'create',
					'allowEmpty' => false,
					'message' => __('Please enter a Abbr', true)
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
			throw new OutOfBoundsException(__('Could not save the statReportMetric, please check your inputs.', true));
		}
	}

	/**
	 * Edits an existing Stat Report Metric.
	 *
	 * @param string $id, stat report metric id
	 * @param array $data, controller post data usually $this->data
	 * @return mixed True on successfully save else merged (initial + post) data as array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function edit($id = null, $data = null) {
		$statReportMetric = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
			)
		));
		if (empty($statReportMetric)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Metric', true));
		}
		$this->set($statReportMetric);
		if (empty($data)) {
			// no data submitted
			return $statReportMetric;
		}
		// data submitted | posted
		$merged = Hash::merge($statReportMetric, $data);
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
	 * Returns the record of a Stat Report Metric.
	 *
	 * @param string $id, stat report metric id
	 * @return array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function view($id = null) {
		$statReportMetric = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id			)
		));
		if (empty($statReportMetric)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Metric', true));
		}
		return $statReportMetric;
	}


}
