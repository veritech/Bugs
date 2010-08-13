<?php
/* Issues Test cases generated on: 2010-08-12 13:08:34 : 1281617614*/
App::import('Controller', 'Issues');

class TestIssuesController extends IssuesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class IssuesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.issue', 'app.project', 'app.version', 'app.user');

	function startTest() {
		$this->Issues =& new TestIssuesController();
		$this->Issues->constructClasses();
	}

	function endTest() {
		unset($this->Issues);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>