<?php
/* Status Test cases generated on: 2010-08-12 13:08:51 : 1281617331*/
App::import('Model', 'Status');

class StatusTestCase extends CakeTestCase {
	var $fixtures = array('app.status', 'app.issue', 'app.project', 'app.version', 'app.user');

	function startTest() {
		$this->Status =& ClassRegistry::init('Status');
	}

	function endTest() {
		unset($this->Status);
		ClassRegistry::flush();
	}

}
?>