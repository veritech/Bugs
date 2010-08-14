<?php
	$this->Javascript->link('jquery-1.4.2.min.js',false);
?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type="text/javascript">

$(function(){
	//Clear the password form field
	$('#UserPassword').val('');
})

</script>