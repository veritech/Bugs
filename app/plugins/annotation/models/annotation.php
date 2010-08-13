<?php
/**
 *  Model
 * 
 * [Short Description]
 *
 * @package default
 * @author Jonathan Dalrymple
 * @version $Id$
 * @copyright Float:Right
 **/
class Annotation extends AnnotationAppModel {
	var $name = 'Annotation';
	
	var $belongsTo = array(
		'User'=>array(
			'className'=>'User',
			'foreignKey'=>'user_id'
		)
	);


	function findAllForModel( $name, $record = 0 ){
		return $this->find('all', array(
				'conditions'=>array(
					'Annotation.model'=>$name,
					'Annotation.foreign_key'=>$record
				),
				'order'=>'Annotation.created DESC'
			)
		);
	}
}
?>