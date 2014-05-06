<?php
/* StatReportMetricsStatReportPlan Fixture generated on: 2014-05-06 12:05:41 : 1399394261 */
class StatReportMetricsStatReportPlanFixture extends CakeTestFixture {
	/**
	 * Name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'StatReportMetricsStatReportPlan';

	/**
	 * Fields
	 *
	 * @var array
	 * @access public
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_metric_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stat_report_plan_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'm' => array('column' => 'stat_report_plan_id', 'unique' => 0),
			'p' => array('column' => 'stat_report_metric_id', 'unique' => 0),
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
			'id' => 'statreportmetrics-plan-1',
			'stat_report_metric_id' => 'count-all-users',
			'stat_report_plan_id' => 'example-1',
		),
		array(
			'id' => 'statreportmetrics-plan-2',
			'stat_report_metric_id' => 'count-active-users',
			'stat_report_plan_id' => 'example-1',
		),
	);

}
