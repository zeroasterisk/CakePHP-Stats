<?php
/* StatReportApiLog Test cases generated on: 2014-05-05 21:05:08 : 1399339748*/
App::uses('StatReportApiLog', 'Stats.Model');

class StatReportApiLogTestCase extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 * @access public
	 */
	public $fixtures = array(
		//'app.user',
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
		$this->StatReportApiLog = ClassRegistry::init('Stats.StatReportApiLog');
		$this->record = $this->StatReportApiLog->find('first');
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
		unset($this->StatReportApiLog);
		ClassRegistry::flush();
	}

	/**
	 * Test adding a Stat Report Api Log
	 *
	 * @return void
	 * @access public
	 */
	public function testAdd() {
		$data = $this->record;
		unset($data['StatReportApiLog']['id']);
		// beware of unique contraints
		$result = $this->StatReportApiLog->add($data);
		$this->assertTrue($result);
		// Verify that adds fail without correct/required fields
		try {
			$data = $this->record;
			unset($data['StatReportApiLog']['id']);
			unset($data['StatReportApiLog']['stat_report_id']);
			$result = $this->StatReportApiLog->add($data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test editing a Stat Report Api Log
	 *
	 * @return void
	 * @access public
	 */
	public function testEdit() {
		$result = $this->StatReportApiLog->edit('statreportapilog-1', null);
		$expected = $this->StatReportApiLog->read(null, 'statreportapilog-1');
		$this->assertEqual($result['StatReportApiLog'], $expected['StatReportApiLog']);
		// put invalidated data here
		$data = $this->record;
		$result = $this->StatReportApiLog->edit('statreportapilog-1', $data);
		$this->assertTrue($result);
		$result = $this->StatReportApiLog->read(null, 'statreportapilog-1');
		// put record specific asserts here for example
		// $this->assertEqual($result['StatReportApiLog']['name'], $data['StatReportApiLog']['name']);
		try {
			$this->StatReportApiLog->edit('wrong_id', $data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test viewing a single Stat Report Api Log
	 *
	 * @return void
	 * @access public
	 */
	public function testView() {
		$result = $this->StatReportApiLog->view('statreportapilog-1');
		$this->assertTrue(isset($result['StatReportApiLog']));
		$this->assertEqual($result['StatReportApiLog']['id'], 'statreportapilog-1');
		try {
			$result = $this->StatReportApiLog->view('wrong_id');
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}


}
