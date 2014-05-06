<?php
class AllStatsTest extends CakeTestSuite {
	public static $working = array(
		//'Model/Behavior/ErrorableBehavior',
		'Model/Member',
	);

	public static function suite() {
		$suite = new CakeTestSuite('All Stats tests');
		$dir = __DIR__;
		$suite->addTestDirectory($dir . DS . 'Model');

		/*
		foreach (array_unique(self::$working) as $file) {
			$suite->addTestFile(TESTS . 'Case' . DS . $file . 'Test.php');
		}
		 */

		return $suite;
	}
}
