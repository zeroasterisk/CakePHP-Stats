<?php
/* StatReportMetric Test cases generated on: 2014-05-05 21:05:54 : 1399339554*/
App::uses('StatReportMetric', 'Stats.Model');

class StatReportMetricTestCase extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 * @access public
	 */
	public $fixtures = array(
		//'app.user',
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
		$this->StatReportMetric = ClassRegistry::init('Stats.StatReportMetric');
		$this->record = $this->StatReportMetric->find('first');
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
		unset($this->StatReportMetric);
		ClassRegistry::flush();
	}

	/**
	 * Test adding a Stat Report Metric
	 *
	 * @return void
	 * @access public
	 */
	public function testAdd() {
		$data = $this->record;
		unset($data['StatReportMetric']['id']);
		$data['StatReportMetric']['name'] = time();
		// beware of unique contraints
		$result = $this->StatReportMetric->add($data);
		$this->assertTrue($result);
		// Verify that adds fail without correct/required fields
		try {
			$data = $this->record;
			unset($data['StatReportMetric']['id']);
			unset($data['StatReportMetric']['name']);
			$result = $this->StatReportMetric->add($data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test editing a Stat Report Metric
	 *
	 * @return void
	 * @access public
	 */
	public function testEdit() {
		$result = $this->StatReportMetric->edit('statreportmetric-1', null);
		$expected = $this->StatReportMetric->read(null, 'statreportmetric-1');
		$this->assertEqual($result['StatReportMetric'], $expected['StatReportMetric']);
		// put invalidated data here
		$data = $this->record;
		//$data['StatReportMetric']['name'] = null;
		$result = $this->StatReportMetric->edit('statreportmetric-1', $data);
		$this->assertTrue($result);
		$data = $this->record;
		$result = $this->StatReportMetric->edit('statreportmetric-1', $data);
		$this->assertTrue($result);
		$result = $this->StatReportMetric->read(null, 'statreportmetric-1');
		// put record specific asserts here for example
		// $this->assertEqual($result['StatReportMetric']['name'], $data['StatReportMetric']['name']);
		try {
			$this->StatReportMetric->edit('wrong_id', $data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test viewing a single Stat Report Metric
	 *
	 * @return void
	 * @access public
	 */
	public function testView() {
		$result = $this->StatReportMetric->view('statreportmetric-1');
		$this->assertTrue(isset($result['StatReportMetric']));
		$this->assertEqual($result['StatReportMetric']['id'], 'statreportmetric-1');
		try {
			$result = $this->StatReportMetric->view('wrong_id');
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}


}
