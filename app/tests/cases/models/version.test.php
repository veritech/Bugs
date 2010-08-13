<?php
/* Version Test cases generated on: 2010-08-12 13:08:05 : 1281617045*/
App::import('Model', 'Version');

class VersionTestCase extends CakeTestCase {
	var $fixtures = array('app.version', 'app.project', 'app.issue', 'app.user');

	function startTest() {
		$this->Version =& ClassRegistry::init('Version');
	}

	function endTest() {
		unset($this->Version);
		ClassRegistry::flush();
	}

}
?>