<div class="versions form">
<?php echo $this->Form->create('Version');?>
	<fieldset>
 		<legend><?php __('Edit Version'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('project_id');
		echo $this->Form->input('commit');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>