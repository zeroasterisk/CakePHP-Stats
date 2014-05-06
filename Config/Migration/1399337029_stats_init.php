<?php
class StatsInit extends CakeMigration {

	/**
	 * Migration description
	 *
	 * @var string
	 * @access public
	 */
	public $description = '';

	/**
	 * Actions to be performed
	 *
	 * @var array $migration
	 * @access public
	 */
	public $migration = array(
		'up' => array(
			'create_table' => array(

				'stat_report_api_logs' => array(
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
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
				),

				'stat_report_values' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'stat_report_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'stat_report_metric_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'if we split to name/value data, this is the name'),
					'value' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'comment' => 'numerical value (if numeric)'),
					'std' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => 8, 'comment' => 'standard deviation'),
					'mad' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => 8, 'comment' => 'median absolute deviation'),
					'is_edited' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'if an admin edits a row he/she must comment why'),
					'notes' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'main' => array('column' => array('stat_report_id', 'stat_report_metric_id'), 'unique' => 0),
						'alt' => array('column' => array('stat_report_metric_id', 'value'), 'unique' => 0),
						'mad' => array('column' => array('mad', 'stat_report_metric_id'), 'unique' => 0),
						'std' => array('column' => array('std', 'stat_report_metric_id'), 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
				),

				'stat_report_metrics' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
				),

				'stat_reports' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'join_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'optional join to any other model'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'start' => array('type' => 'date', 'null' => true, 'default' => null),
					'stop' => array('type' => 'date', 'null' => true, 'default' => null),
					'range' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'comment' => 'month, week, day, etc.'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'a' => array('column' => array('join_id', 'start', 'stop'), 'unique' => 0),
						'b' => array('column' => array('join_id', 'range', 'start'), 'unique' => 0)
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'stat_report_api_logs',
				'stat_report_metrics',
				'stat_report_values',
				'stat_reports',
			),
		),
	);

	/**
	 * Before migration callback
	 *
	 * @param string $direction, up or down direction of migration process
	 * @return boolean Should process continue
	 * @access public
	 */
	public function before($direction) {
		return true;
	}

	/**
	 * After migration callback
	 *
	 * @param string $direction, up or down direction of migration process
	 * @return boolean Should process continue
	 * @access public
	 */
	public function after($direction) {
		return true;
	}
}
