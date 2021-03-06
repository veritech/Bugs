<div class="versions index">
	<h2><?php __('Versions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('commit');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($versions as $version):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $version['Version']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($version['Project']['name'], array('controller' => 'projects', 'action' => 'view', $version['Project']['id'])); ?>
		</td>
		<td><?php echo $version['Version']['commit']; ?>&nbsp;</td>
		<td><?php echo $version['Version']['name']; ?>&nbsp;</td>
		<td><?php echo $version['Version']['created']; ?>&nbsp;</td>
		<td><?php echo $version['Version']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $version['Version']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $version['Version']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $version['Version']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $version['Version']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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