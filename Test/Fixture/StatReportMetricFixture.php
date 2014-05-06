<?php
/* StatReportMetric Fixture generated on: 2014-05-05 21:05:54 : 1399339554 */
class StatReportMetricFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'StatReportMetric';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'method' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'params' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_key_value' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'if the "values" are key/value (multiple rows per report)'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'model' => array('column' => array('name', 'method'), 'unique' => 0),
			'name' => array('column' => 'name', 'unique' => 1),
			'abbr' => array('column' => 'abbr', 'unique' => 0)
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
			'id' => 'statreportmetric-1',
			'created' => '2014-05-05 15:55:55',
			'name' => 'test view',
			'abbr' => 'view',
			'model' => 'Xyz',
			'method' => 'getView',
			'params' => '{key:"view"}',
			'is_key_value' => 1
		),
	);

}
