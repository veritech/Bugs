<?php
/* Versions Test cases generated on: 2010-08-12 13:08:49 : 1281617089*/
App::import('Controller', 'Versions');

class TestVersionsController extends VersionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class VersionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.version', 'app.project', 'app.issue', 'app.user');

	function startTest() {
		$this->Versions =& new TestVersionsController();
		$this->Versions->constructClasses();
	}

	function endTest() {
		unset($this->Versions);
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