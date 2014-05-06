<?php
/* StatReportPlan Fixture generated on: 2014-05-06 12:05:41 : 1399394261 */
class StatReportPlanFixture extends CakeTestFixture {
	/**
	 * Name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'StatReportPlan';

	/**
	 * Fields
	 *
	 * @var array
	 * @access public
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'join_model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => 'optional join to any other model', 'charset' => 'utf8'),
		'join_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'comment' => 'optional join to any other model', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => 'Admin only reference to metric', 'charset' => 'utf8'),
		'label' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'comment' => 'Label for reports', 'charset' => 'utf8'),
		'ranges' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => 'CSV: month, week, day, etc.', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'main' => array('column' => array('join_model', 'join_id', 'name'), 'unique' => 0),
			'names' => array('column' => array('name', 'label'), 'unique' => 0),
			'ranges' => array('column' => 'ranges', 'unique' => 0)
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
			'id' => 'statreportplan-1',
			'join_model' => '',
			'join_id' => '',
			'created' => '2014-01-01 00:00:00',
			'name' => 'Report Plan One',
			'label' => 'Report One',
			'ranges' => 'month,week,day'
		),
	);

}
