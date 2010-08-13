<?php
class IssuesController extends AppController {

	var $name = 'Issues';
	
	//var $uses = array('Issue','IssueRev');
	
	//
	function beforeFilter(){
		//$this->Issue->shadowModel = $this->IssueRev;
	}
	
	//CRUD
	function index() {
		$this->Issue->recursive = 0;
		$this->set('issues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid issue', true), array('action' => 'index'));
		}
		
		$issue = $this->Issue->read(null, $id);
		$annotations = $this->Issue->Annotation->findAllForModel('Issue',$id);

		$this->set(compact('issue','annotations') );
	}

	function add() {
		if (!empty($this->data)) {
			$this->Issue->create();
			if ($this->Issue->save($this->data)) {
				$this->flash(__('Issue saved.', true), array('action' => 'index'));
			} else {
			}
		}
		$projects = $this->Issue->Project->find('list');
		$versions = $this->Issue->Version->find('list');
		$creators = $this->Issue->Creator->find('list');
		$assigneds = $this->Issue->Assigned->find('list');
		$statuses = $this->Issue->Status->find('list');
		$this->set(compact('projects', 'versions', 'creators', 'assigneds','statuses'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid issue', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Issue->save($this->data)) {
				$this->flash(__('Issue updated', true), array('action' => 'view',$id));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Issue->read(null, $id);
		}
		$projects = $this->Issue->Project->find('list');
		$versions = $this->Issue->Version->find('list');
		$creators = $this->Issue->Creator->find('list');
		$assigneds = $this->Issue->Assigned->find('list');
		$statuses = $this->Issue->Status->find('list'); 
		$this->set(compact('projects', 'versions', 'creators', 'assigneds','statuses'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid issue', true)), array('action' => 'index'));
		}
		if ($this->Issue->delete($id)) {
			$this->flash(__('Issue deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Issue was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
?>