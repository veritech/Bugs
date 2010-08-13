<?php
/**
 * AnnotationsController
 * 
 * [Short Description]
 *
 * @package default
 * @author Jonathan Dalrymple
 * @version $Id$
 * @copyright Float:Right
 **/

class AnnotationsController extends AnnotationAppController {
/**
 * The name of this controller. Controller names are plural, named after the model they manipulate.
 *
 * @var string
 * @access public
 */
	var $name = 'Annotations';

/**
 * An array containing the names of helpers this controller uses. The array elements should
 * not contain the "Helper" part of the classname.
 *
 * @var mixed A single name as a string or a list of names as an array.
 * @access protected
 */
	var $helpers = array('Html', 'Form');

/**
 * Array containing the names of components this controller uses. Component names
 * should not contain the "Component" portion of the classname.
 *
 * @var array
 * @access public
 */
	var $components = array('Auth');

/**
 * Called before the controller action.
 *
 * @access public
 */
	function beforeFilter() {
	}

/**
 * Called after the controller action is run, but before the view is rendered.
 *
 * @access public
 */
	function beforeRender() {
	}

/**
 * Called after the controller action is run and rendered.
 *
 * @access public
 */
	function afterFilter() {
	}
	
	function add(){
		if (!empty($this->data)) {
			//Add the user info
			$this->data['Annotation']['user_id'] = $this->Auth->user('id');
			
			$this->Annotation->create();
			if ($this->Annotation->save($this->data)) {
				$this->flash(__('Annotation saved.', true),array(
					'plugin'=>false,
					'controller'=> Inflector::pluralize($this->data['Annotation']['model']),
					'action'=>'view',
					$this->data['Annotation']['foreign_key']
					)
				);
			} else {
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Annotation.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('data', $this->Annotation->read(null, $id));
	}
	
	function delete( $id = null ){
		if (!$id) {
			$this->flash(sprintf(__('Invalid annotation', true)), array('action' => 'index'));
		}
		if ($this->Annotation->delete($id)) {
			$this->flash(__('Annotation deleted', true), array('action' => 'index'));
		}
		$this->flash(__('Annotation was not deleted', true), array('action' => 'index'));
		$this->redirect(array('plugin'=>false,'controller'=>'issues','action' => 'index'));
	}

}
?>