<?php
/* StatReportApiLog Fixture generated on: 2014-05-05 21:05:08 : 1399339748 */
class StatReportApiLogFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'StatReportApiLog';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'input' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'request' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'raw', 'charset' => 'utf8'),
		'response' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'raw', 'charset' => 'utf8'),
		'result' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'stat_report_id' => array('column' => 'stat_report_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 * @access public
 */
	public $records = array(
		array(
			'id' => 'statreportapilog-1',
			'stat_report_id' => 'statreport-1',
			'created' => '2014-01-01 00:00:00',
			'input' => '',
			'request' => '',
			'response' => '',
			'result' => '',
		),
	);

}
