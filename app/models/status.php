<?php
class Status extends AppModel {
	var $name = 'Status';
	var $displayField = 'name';
	
	var $order = array(
		'Status.weighting DESC'
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Issue' => array(
			'className' => 'Issue',
			'foreignKey' => 'status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>