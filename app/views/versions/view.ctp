<div class="versions view">
	<small>Version (<?php print $this->Html->link('Edit version','/versions/edit/'.$version['Version']['id'])?>)</small>
	<h2><?php print $version['Version']['name']?></h2>
	<small>Project (<?php print $this->Html->link('View','/projects/view/'.$version['Project']['id'])?>)</small>
	<h2><?php print $version['Project']['name']?></h2>
	<small>Issues (<?php print $this->Html->link('New issue','/issues/add')?>)</small>
	<table>
		<?php
		
		print $this->Html->tableHeaders( array(
			'Issue no',
			'Title',
			'Status',
			'Assigned',
			'modified'
			)
		);
		
		foreach( $issues as $issue ):
		
			print $this->Html->tableCells( array(
				$this->Html->link('#'.$issue['Issue']['id'],'/issues/view/'.$issue['Issue']['id']),
				$issue['Issue']['title'],
				$issue['Status']['name'],
				$issue['Assigned']['username'],
				$this->Time->nice($issue['Issue']['modified'])
				),
				array('class'=>'status-'.strtolower($issue['Status']['name'])),
				array('class'=>'status-'.strtolower($issue['Status']['name']))				
			);
		
		endforeach;
		
		?>
	</table>
</div>
<?php //debug($issues); ?>