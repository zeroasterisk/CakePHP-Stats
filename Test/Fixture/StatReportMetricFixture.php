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
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'Admin only reference to metric'),
		'label' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'Label for reports'),
		'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'Short version of Label for reports'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'method' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'params' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_key_value' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'if the "values" are key/value (multiple rows per report)'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'model' => array('column' => array('name', 'method'), 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1),
			'abbr' => array('column' => 'abbr', 'unique' => 0),
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
			'id' => 'statreportmetric-1',
			'created' => '2014-05-05 15:55:55',
			'name' => 'test view name',
			'label' => 'test view',
			'abbr' => 'view',
			'model' => '',
			'method' => '',
			'params' => '',
			'is_key_value' => 1
		),
		array(
			'id' => 'count-all-users',
			'created' => '2014-05-05 15:55:55',
			'name' => 'Count of All Users',
			'label' => 'All Users',
			'abbr' => 'All',
			'model' => 'User',
			'method' => 'statsCount',
			'params' => '',
			'is_key_value' => 0
		),
		array(
			'id' => 'count-active-users',
			'created' => '2014-05-05 15:55:55',
			'name' => 'Count of Active Users',
			'label' => 'Active Users',
			'abbr' => 'Active',
			'model' => 'User',
			'method' => 'statsCount',
			'params' => '{is_active:1}',
			'is_key_value' => 0
		),
	);

}
