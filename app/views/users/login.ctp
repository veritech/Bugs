<div class="users login prepend-7 span-8 append-7">
	<?php
	
	print $this->Form->create('User',array('action'=>'login'));
	
	print $this->Form->input('username');
	
	print $this->Form->input('password');
	
	print $this->Form->end('Login');
	
	?>
</div>

<small>
	<?php 
	print $this->Html->link(
		'Request Invite',
		array(
			'plugin'=>'invite',
			'controller'=>'invites',
			'action'=>'add'
		)
	); 
	?>
</small>