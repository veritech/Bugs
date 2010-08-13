<?php
/* Issue Test cases generated on: 2010-08-12 13:08:20 : 1281617420*/
App::import('Model', 'Issue');

class IssueTestCase extends CakeTestCase {
	var $fixtures = array('app.issue', 'app.project', 'app.version', 'app.user');

	function startTest() {
		$this->Issue =& ClassRegistry::init('Issue');
	}

	function endTest() {
		unset($this->Issue);
		ClassRegistry::flush();
	}

}
?>