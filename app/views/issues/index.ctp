<div class="issues index">
	<h2><?php __('Issues');?></h2>
	<small>All Issues (<?php print $this->Html->link('New Issue','/issues/add')?>)</small>
	<table>
		<?php
			
			print $this->Html->tableHeaders( array(
				$this->Paginator->sort('Issue no.','id'),
				$this->Paginator->sort('Project'),
				$this->Paginator->sort('Title'),
				$this->Paginator->sort('Assigned'),
				$this->Paginator->sort('Status'),
				$this->Paginator->sort('Created','created')
				)
			);
			
			foreach( $issues as $issue ):
			
				$row = array(
					$this->Html->link('#'.$issue['Issue']['id'],'/issues/view/'.$issue['Issue']['id']),
					$issue['Project']['name'],
					$issue['Issue']['title'],
					$issue['Assigned']['username'],
					$issue['Status']['name'],
					$this->Time->nice($issue['Issue']['created'])
				);
				
				print $this->Html->tableCells(
					$row,
					array('class'=>'status-'.strtolower($issue['Status']['name'])),
					array('class'=>'status-'.strtolower($issue['Status']['name'])));
			
			endforeach;
		?>
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