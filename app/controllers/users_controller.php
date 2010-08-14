<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	var $uses = array(
		'Project',
		'Issue',
		'User'
	);
	
	/*
	* 
	*/
	function beforeFilter(){
		$this->Auth->allow('add');
	}
	
	/*
	* Authentication
	*/
	function login(){
		
	}
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	/*
	* 
	*/
	function dashboard(){
		
		//$projects = $this->Project->find('all');
		
		$newIssues 	= $this->Issue->find('all', array(
				'conditions'=>array(
					//'Issue.created'=>
				),
				'order'=>'Issue.created DESC',
				'limit'=>20
			)
		);
		
		$assignedIssues = $this->Issue->find('all',array(
				'conditions'=>array(
					'Issue.assigned_id'=> $this->Auth->user('id')
				),
				'limit'=>20
			)
		);
		
		$updatedIssues = $this->Issue->find('all',array(
				'order'=>'Issue.modified DESC',
				'limit'=>20
			)
		);
		
		$this->set(compact('newIssues','assignedIssues','updatedIssues'));
	}

	/*
	* Crud Methods
	*/
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid user', true), array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add( $hash = null ) {
		
		if( !($hash == 'mchat' ) ){
			$this->flash('Invalid invite code','/');
		}
		
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Auth->login($this->data);
				$this->flash(__('User Created.', true), array('action' => 'dashboard'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid user', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->flash(__('The user has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid user', true)), array('action' => 'index'));
		}
		if ($this->User->delete($id)) {
			$this->flash(__('User deleted', true), array('action' => 'index'));
		}
		$this->flash(__('User was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
?>