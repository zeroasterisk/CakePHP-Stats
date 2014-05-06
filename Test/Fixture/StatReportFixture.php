<?php
/* StatReport Fixture generated on: 2014-05-06 12:05:09 : 1399394349 */
class StatReportFixture extends CakeTestFixture {
	/**
	 * Name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'StatReport';

	/**
	 * Fields
	 *
	 * @var array
	 * @access public
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_plan_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => 'optional join to any other model', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'start' => array('type' => 'date', 'null' => true, 'default' => null),
		'stop' => array('type' => 'date', 'null' => true, 'default' => null),
		'range' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'comment' => 'month, week, day, etc.', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'a' => array('column' => array('stat_report_plan_id', 'start', 'stop'), 'unique' => 0),
			'b' => array('column' => array('stat_report_plan_id', 'range', 'start'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
	);

	/**
	 * Records
	 *
	 * @var array
	 * @access public
	 */
	public $records = array(
		array(
			'id' => 'statreport-1',
			'stat_report_plan_id' => 'statreportplan-1',
			'created' => '2014-01-01 00:00:00',
			'start' => '2014-01-05',
			'stop' => '2014-01-05',
			'range' => 'day',
		),
	);

}
