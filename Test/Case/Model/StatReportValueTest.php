<?php
/* StatReportValue Test cases generated on: 2014-05-05 21:05:23 : 1399339523*/
App::uses('StatReportValue', 'Stats.Model');

class StatReportValueTestCase extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 * @access public
	 */
	public $fixtures = array(
		//'app.user',
		'plugin.stats.stat_report_value',
		'plugin.stats.stat_report_metric',
		'plugin.stats.stat_report_api_log',
		'plugin.stats.stat_report',
	);


	/**
	 * Start Test callback
	 *
	 * @param string $method
	 * @return void
	 * @access public
	 */
	public function startTest($method) {
		parent::startTest($method);
		$this->StatReportValue = ClassRegistry::init('Stats.StatReportValue');
		$this->record = $this->StatReportValue->find('first');
	}

	/**
	 * End Test callback
	 *
	 * @param string $method
	 * @return void
	 * @access public
	 */
	public function endTest($method) {
		parent::endTest($method);
		unset($this->StatReportValue);
		ClassRegistry::flush();
	}

	/**
	 * Test adding a Stat Report Value
	 *
	 * @return void
	 * @access public
	 */
	public function testAdd() {
		$data = $this->record;
		unset($data['StatReportValue']['id']);
		// beware of unique contraints
		$result = $this->StatReportValue->add($data);
		$this->assertTrue($result);
		// Verify that adds fail without correct/required fields
		$required = array('stat_report_id', 'stat_report_metric_id', 'value');
		foreach ($required as $field) {
			try {
				$data = $this->record;
				unset($data['StatReportValue']['id']);
				unset($data['StatReportValue'][$field]);
				$result = $this->StatReportValue->add($data);
				$this->assertTrue(false, 'Expected Exception');
			} catch (OutOfBoundsException $e) {
				$this->assertTrue(true, 'Correct Exception Thrown');
			}
		}
	}

	/**
	 * Test editing a Stat Report Value
	 *
	 * @return void
	 * @access public
	 */
	public function testEdit() {
		$result = $this->StatReportValue->edit('statreportvalue-1', null);
		$expected = $this->StatReportValue->read(null, 'statreportvalue-1');
		$this->assertEqual($result['StatReportValue'], $expected['StatReportValue']);
		// put invalidated data here
		$data = $this->record;
		$result = $this->StatReportValue->edit('statreportvalue-1', $data);
		$this->assertTrue($result);
		$result = $this->StatReportValue->read(null, 'statreportvalue-1');
		try {
			$this->StatReportValue->edit('wrong_id', $data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test viewing a single Stat Report Value
	 *
	 * @return void
	 * @access public
	 */
	public function testView() {
		$result = $this->StatReportValue->view('statreportvalue-1');
		$this->assertTrue(isset($result['StatReportValue']));
		$this->assertEqual($result['StatReportValue']['id'], 'statreportvalue-1');
		try {
			$result = $this->StatReportValue->view('wrong_id');
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}


}
