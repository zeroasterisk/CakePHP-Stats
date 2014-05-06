<?php

App::uses('StatsAppModel', 'Stats.Model');

class StatReport extends StatsAppModel {
	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = 'StatReport';

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
		array('name' => 'q', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReport.id'),
		array('name' => 'term', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReport.id'),
		array('name' => 'type', 'type' => 'query', 'method' => 'searchType'),
		array('name' => 'site_id', 'type' => 'value', 'field' => 'StatReport.site_id'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'StatReport.created BETWEEN ? AND ?'),
	);

	/**
	 * belongsTo association
	 *
	 * @var array $belongsTo	 * @access public
	 */
	public $belongsTo = array(
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'site_id',
		)
	);
	/**
	 * hasMany association
	 *
	 * @var array $hasMany
	 * @access public
	 */

	public $hasMany = array(
		'StatApiLog' => array(
			'className' => 'StatApiLog',
			'foreignKey' => 'stat_report_id',
			'dependent' => false,
		),
		'StatReportValue' => array(
			'className' => 'StatReportValue',
			'foreignKey' => 'stat_report_id',
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
			'start' => array(
				'date' => array(
					'rule' => array('date'),
					'required' => 'create',
					'allowEmpty' => false,
					'message' => __('Please enter a Start', true)
				),
			),
			'stop' => array(
				'date' => array(
					'rule' => array('date'),
					'required' => 'create',
					'allowEmpty' => false,
					'message' => __('Please enter a Stop', true)
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
			} else {
				throw new OutOfBoundsException(__('Could not save the statReport, please check your inputs.', true));
			}
			return $return;
		}
	}

	/**
	 * Edits an existing Stat Report.
	 *
	 * @param string $id, stat report id
	 * @param array $data, controller post data usually $this->data
	 * @return mixed True on successfully save else merged (initial + post) data as array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function edit($id = null, $data = null) {
		$statReport = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
			)
		));
		if (empty($statReport)) {
			throw new OutOfBoundsException(__('Invalid Stat Report', true));
		}
		$this->set($statReport);
		if (empty($data)) {
			// no data submitted
			return $statReport;
		}
		// data submitted | posted
		$merged = Hash::merge($statReport, $data);
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
	 * Returns the record of a Stat Report.
	 *
	 * @param string $id, stat report id
	 * @return array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function view($id = null) {
		$statReport = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id			)
		));
		if (empty($statReport)) {
			throw new OutOfBoundsException(__('Invalid Stat Report', true));
		}
		return $statReport;
	}


}
