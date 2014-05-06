<?php
/* StatReportPlan Test cases generated on: 2014-05-06 12:05:41 : 1399394261*/
App::uses('StatReportPlan', 'Stats.Model');

class StatReportPlanTestCase extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 * @access public
	 */
	public $fixtures = array(
		//'app.user',
		'plugin.stats.stat_report_metric',
		'plugin.stats.stat_report_metrics_stat_report_plan',
		'plugin.stats.stat_report_api_log',
		'plugin.stats.stat_report_plan',
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
		$this->StatReportPlan = ClassRegistry::init('StatReportPlan');
		$fixture = new StatReportPlanFixture();
		$this->record = array('StatReportPlan' => $fixture->records[0]);
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
		unset($this->StatReportPlan);
		ClassRegistry::flush();
	}

	/**
	 * Test adding a Stat Report Plan
	 *
	 * @return void
	 * @access public
	 */
	public function testAdd() {
		$data = $this->record;
		unset($data['StatReportPlan']['id']);
		// beware of unique contraints
		$result = $this->StatReportPlan->add($data);
		$this->assertTrue(empty($this->StatReportPlan->validationErrors));
		$this->assertTrue($result);
		// Verify that adds fail without correct/required fields
		try {
			$data = $this->record;
			unset($data['StatReportPlan']['id']);
			unset($data['StatReportPlan']['name']);
			$result = $this->StatReportPlan->add($data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test editing a Stat Report Plan
	 *
	 * @return void
	 * @access public
	 */
	public function testEdit() {
		$result = $this->StatReportPlan->edit('statreportplan-1', null);
		$expected = $this->StatReportPlan->read(null, 'statreportplan-1');
		$this->assertEqual($result['StatReportPlan'], $expected['StatReportPlan']);
		// put invalidated data here
		$data = $this->record;
		//$data['StatReportPlan']['name'] = null;
		$result = $this->StatReportPlan->edit('statreportplan-1', $data);
		$this->assertTrue($result);
		$data = $this->record;
		$result = $this->StatReportPlan->edit('statreportplan-1', $data);
		$this->assertTrue($result);
		$result = $this->StatReportPlan->read(null, 'statreportplan-1');
		// put record specific asserts here for example
		// $this->assertEqual($result['StatReportPlan']['name'], $data['StatReportPlan']['name']);
		try {
			$this->StatReportPlan->edit('wrong_id', $data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test viewing a single Stat Report Plan
	 *
	 * @return void
	 * @access public
	 */
	public function testView() {
		$result = $this->StatReportPlan->view('statreportplan-1');
		$this->assertTrue(isset($result['StatReportPlan']));
		$this->assertEqual($result['StatReportPlan']['id'], 'statreportplan-1');
		try {
			$result = $this->StatReportPlan->view('wrong_id');
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

}
