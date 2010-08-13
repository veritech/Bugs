<?php
/**
 * AnnotationAppsController
 * 
 * [Short Description]
 *
 * @package default
 * @author Jonathan Dalrymple
 * @version $Id$
 * @copyright Float:Right
 **/

class AnnotationAppController extends AppController {

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
	var $components = array();

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
}
?>