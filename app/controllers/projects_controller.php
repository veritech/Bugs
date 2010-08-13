<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	
	//var $uses = array('Project','Issue');
	
	function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid project', true), array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
		$this->set('issues', $this->Project->Issue->findAllByProjectId($id));
		$this->set('versions', $this->Project->Version->findAllByProjectId($id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->flash(__('Project saved.', true), array('action' => 'index'));
			} else {
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(sprintf(__('Invalid project', true)), array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->flash(__('The project has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(sprintf(__('Invalid project', true)), array('action' => 'index'));
		}
		if ($this->Project->delete($id)) {
			$this->flash(__('Project deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Project was not deleted', true), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
?>