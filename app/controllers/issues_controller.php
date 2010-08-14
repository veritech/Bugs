<?php
class IssuesController extends AppController {

	var $name = 'Issues';
	
	//Components
	var $components = array(
		'email'
	);
	//
	function beforeFilter(){
		//$this->Issue->shadowModel = $this->IssueRev;
	}
	
	/*
	* Get the emails of all involved and notify them that the record has changed
	* 
	* 
	*/
	private function notifyUsers( $id, $message = null ){
		
		$recipents = array();
		//Annotations
		$annotations = $this->Issue->Annotation->findAllForModel('Issue',$id);
		
		//loop over
		foreach( $annotations as $annotation ){
			$recipents[] = $annotation['User']['email'];
		}
		
		$issue = $this->Issue->read(null, $id);
		//Issue creator
		$recipents[] = $issue['Creator']['email'];
		//issue assignee
		$recipents[] = $issue['Assigned']['email'];	
		
		//Remove duplicates
		$recipents = array_unique($recipents);
		//Send some emails
		//debug($recipents);
		
		foreach( $recipents as $recipent ){
			
			$this->email->reset();
			
			$this->email->subject = sprintf("[Buggin'] Issue %d updated", $id);
			
			$this->email->to = $recipent;
			
			$this->email->from = 'no-reply@float-right.co.uk';
			
			$this->email->sendAs = 'text';
			
			if( Configure::read('debug') > 0){
				$this->email->delivery = 'debug';
			}
			
			$this->email->send(sprintf("Issue %d has been updated",$id));
		}
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
		
		//Get a diff
		$diff = $this->Issue->diff();
		
		$this->set(compact('issue','annotations','diff') );
	}

	function add() {
		if (!empty($this->data)) {
			$this->Issue->create();
			if ($this->Issue->save($this->data)) {
				$this->flash(__('Issue saved.', true), array('action' => 'index'));
			} else {
			}
		}
		
		//Set the creator
		$this->data['Issue']['creator_id'] = $this->Auth->user('id');
		
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
				$this->notifyUsers($id);
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