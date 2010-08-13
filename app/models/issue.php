<?php
class Issue extends AppModel {
	var $name = 'Issue';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Status.weighting DESC'
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Version' => array(
			'className' => 'Version',
			'foreignKey' => 'version_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Assigned' => array(
			'className' => 'User',
			'foreignKey' => 'assigned_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'Annotation'=>array(
			'className'=>'Annotation.Annotation',
			'foreignKey'=>'foreign_key',
			'conditions'=>array(
				'Annotation.model'=>'Issue'
			),
			'order'=>'Annotation.created'
		)
	);
	
	var $actsAs = array(
		'Annotation.Annotatable',
		'Revision'
	);
}