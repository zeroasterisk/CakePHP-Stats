<?php

App::uses('StatsAppModel', 'Stats.Model');

class StatReportApiLog extends StatsAppModel {
	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = 'StatReportApiLog';

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
		array('name' => 'q', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportApiLog.id'),
		array('name' => 'term', 'type' => 'subquery', 'method' => 'searchTermMatch', 'field' => 'StatReportApiLog.id'),
		array('name' => 'type', 'type' => 'query', 'method' => 'searchType'),
		array('name' => 'site_id', 'type' => 'value', 'field' => 'StatReportApiLog.site_id'),
		array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'StatReportApiLog.created BETWEEN ? AND ?'),
	);

	/**
	 * belongsTo association
	 *
	 * @var array $belongsTo	 * @access public
	 */
	public $belongsTo = array(
		'StatReport' => array(
			'className' => 'StatReport',
			'foreignKey' => 'stat_report_id',
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
			'stat_report_id' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'required' => 'create',
					'allowEmpty' => false,
					'message' => __('Please enter a Stat Report', true)
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
			throw new OutOfBoundsException(__('Could not save the statReportApiLog, please check your inputs.', true));
		}
	}

	/**
	 * Edits an existing Stat Report Api Log.
	 *
	 * @param string $id, stat report api log id
	 * @param array $data, controller post data usually $this->data
	 * @return mixed True on successfully save else merged (initial + post) data as array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function edit($id = null, $data = null) {
		$statReportApiLog = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
			)
		));
		if (empty($statReportApiLog)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Api Log', true));
		}
		$this->set($statReportApiLog);
		if (empty($data)) {
			// no data submitted
			return $statReportApiLog;
		}
		// data submitted | posted
		$merged = Hash::merge($statReportApiLog, $data);
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
	 * Returns the record of a Stat Report Api Log.
	 *
	 * @param string $id, stat report api log id
	 * @return array
	 * @throws OutOfBoundsException If the element does not exists
	 * @access public
	 */
	public function view($id = null) {
		$statReportApiLog = $this->find('first', array(
			'contain' => array(),
			'conditions' => array("{$this->alias}.{$this->primaryKey}" => $id)
		));
		if (empty($statReportApiLog)) {
			throw new OutOfBoundsException(__('Invalid Stat Report Api Log', true));
		}
		return $statReportApiLog;
	}


}
