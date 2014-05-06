<?php
/* StatReportValue Fixture generated on: 2014-05-05 21:05:23 : 1399339523 */
class StatReportValueFixture extends CakeTestFixture {
	/**
	 * Name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'StatReportValue';

	/**
	 * Fields
	 *
	 * @var array
	 * @access public
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_metric_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'if we split to name/value data, this is the name', 'charset' => 'utf8'),
		'value' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'comment' => 'numerical value (if numeric)'),
		'std' => array('type' => 'float', 'null' => false, 'default' => null, 'key' => 'index', 'comment' => 'standard deviation'),
		'mad' => array('type' => 'float', 'null' => false, 'default' => null, 'key' => 'index', 'comment' => 'median absolute deviation'),
		'is_edited' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'if an admin edits a row he/she must comment why'),
		'notes' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'main' => array('column' => array('stat_report_id', 'stat_report_metric_id'), 'unique' => 0),
			'alt' => array('column' => array('stat_report_metric_id', 'value'), 'unique' => 0),
			'mad' => array('column' => array('mad', 'stat_report_metric_id'), 'unique' => 0),
			'std' => array('column' => array('std', 'stat_report_metric_id'), 'unique' => 0)
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
			'id' => 'statreportvalue-1',
			'stat_report_id' => 'statreport-1',
			'stat_report_metric_id' => 'statreportmetric-1',
			'created' => '2014-01-01 00:00:00',
			'name' => '',
			'value' => 1,
			'std' => 0,
			'mad' => 0,
			'is_edited' => 0,
			'notes' => '',
		),
	);

}
