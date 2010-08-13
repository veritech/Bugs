<?php
	/*
	* 
	* $model 	The name of the model
	* $fk		The foreignKey
	*/
	
	//Annotation add form
	print $this->Form->create('Annotation.Annotation',array('url'=>'/annotation/annotations/add'));
	
	print $this->Form->input('body', array('label'=>'Note'));
	
	print $this->Form->hidden('model', array('value'=> $model));
	
	print $this->Form->hidden('foreign_key', array('value'=> $fk));
	
	print $this->Form->end('Create');

?>