<?php
class VersionsController extends AppController {

	var $name = 'Versions';

	function index() {
		$this->Version->recursive = 0;
		$this->set('versions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid version', true), array('action' => 'index'));
		}
		$this->set('version', $this->Version->read(null, $id));
		$this->set('issues', $this->Version->Issue->findAllByVersionId($id));
	}

	function add( $project_id = null ) {
		if (!empty($this->data)) {
			$this->Version->create();
			if ($this->Version->save($this->data)) {
				$this->flash(__('Version saved.', true), array('action' => 'index'));
			} else {
			}
		}
		else{
			$projects = $this->Version->Project->find('list',array('conditions'=>'Project.id = '.$project_id));
			$this->set(compact('projects'));			
		}

	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid version', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Version->save($this->data)) {
				$this->flash(__('The version has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Version->read(null, $id);
		}
		$projects = $this->Version->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid version', true)), array('action' => 'index'));
		}
		if ($this->Version->delete($id)) {
			$this->flash(__('Version deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Version was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
?>