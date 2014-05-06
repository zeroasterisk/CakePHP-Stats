<?php
/* StatReport Test cases generated on: 2014-05-05 21:05:42 : 1399339542*/
App::uses('StatReport', 'Stats.Model');

class StatReportTestCase extends CakeTestCase {

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
		$this->StatReport = ClassRegistry::init('Stats.StatReport');
		$this->record = $this->StatReport->find('first');
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
		unset($this->StatReport);
		ClassRegistry::flush();
	}

	/**
	 * Test adding a Stat Report
	 *
	 * @return void
	 * @access public
	 */
	public function testAdd() {
		$data = $this->record;
		unset($data['StatReport']['id']);
		// beware of unique contraints
		$result = $this->StatReport->add($data);
		$this->assertTrue($result);
		// Verify that adds fail without correct/required fields
		try {
			$data = $this->record;
			unset($data['StatReport']['id']);
			unset($data['StatReport']['start']);
			$result = $this->StatReport->add($data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test editing a Stat Report
	 *
	 * @return void
	 * @access public
	 */
	public function testEdit() {
		$result = $this->StatReport->edit('statreport-1', null);
		$expected = $this->StatReport->read(null, 'statreport-1');
		$this->assertEqual($result['StatReport'], $expected['StatReport']);
		// put invalidated data here
		$data = $this->record;
		//$data['StatReport']['name'] = null;
		$result = $this->StatReport->edit('statreport-1', $data);
		$this->assertTrue($result);
		$data = $this->record;
		$result = $this->StatReport->edit('statreport-1', $data);
		$this->assertTrue($result);
		$result = $this->StatReport->read(null, 'statreport-1');
		// put record specific asserts here for example
		// $this->assertEqual($result['StatReport']['name'], $data['StatReport']['name']);
		try {
			$this->StatReport->edit('wrong_id', $data);
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}

	/**
	 * Test viewing a single Stat Report
	 *
	 * @return void
	 * @access public
	 */
	public function testView() {
		$result = $this->StatReport->view('statreport-1');
		$this->assertTrue(isset($result['StatReport']));
		$this->assertEqual($result['StatReport']['id'], 'statreport-1');
		try {
			$result = $this->StatReport->view('wrong_id');
			$this->assertTrue(false, 'Expected Exception');
		} catch (OutOfBoundsException $e) {
			$this->assertTrue(true, 'Correct Exception Thrown');
		}
	}


}
