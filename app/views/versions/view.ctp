<div class="versions view">
<h2><?php  __('Version');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $version['Version']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Project'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($version['Project']['name'], array('controller' => 'projects', 'action' => 'view', $version['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Commit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $version['Version']['commit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $version['Version']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $version['Version']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $version['Version']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Version', true), array('action' => 'edit', $version['Version']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Version', true), array('action' => 'delete', $version['Version']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $version['Version']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Versions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Version', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues', true), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue', true), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Issues');?></h3>
	<?php if (!empty($version['Issue'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Project Id'); ?></th>
		<th><?php __('Version Id'); ?></th>
		<th><?php __('Creator Id'); ?></th>
		<th><?php __('Assigned Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($version['Issue'] as $issue):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $issue['id'];?></td>
			<td><?php echo $issue['title'];?></td>
			<td><?php echo $issue['description'];?></td>
			<td><?php echo $issue['status_id'];?></td>
			<td><?php echo $issue['project_id'];?></td>
			<td><?php echo $issue['version_id'];?></td>
			<td><?php echo $issue['creator_id'];?></td>
			<td><?php echo $issue['assigned_id'];?></td>
			<td><?php echo $issue['created'];?></td>
			<td><?php echo $issue['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'issues', 'action' => 'view', $issue['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'issues', 'action' => 'edit', $issue['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'issues', 'action' => 'delete', $issue['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $issue['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Issue', true), array('controller' => 'issues', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
