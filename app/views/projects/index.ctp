<div class="projects index">
	<h2><?php __('Projects');?></h2>
	<small>All Projects (<?php print $this->Html->link('New Project','/projects/add')?>)</small>
	<div class="list">
	<?php
	foreach ($projects as $project):
		
		printf(
			'<div class="box"><span class="large">%s</span> <small>%s</small></div>',
			$this->Html->link($project['Project']['name'],'/projects/view/'.$project['Project']['id']),
			$this->Time->nice($project['Project']['created'])
		);
		
	endforeach; ?>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>