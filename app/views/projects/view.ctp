<div class="projects view">
	<div class="">
		<small>Project (<?php print $this->Html->link('Edit project','/projects/edit/'. $project['Project']['id']); ?>)</small>
		<h2><?php print $project['Project']['name']; ?></h2>
	</div>
	<div class="versions">
		<small>All Versions (<?php print $this->Html->link('New Version','/versions/add/'.$project['Project']['id'])?>)</small>
		<table>
		<?php
		
		print $this->Html->tableHeaders( array(
			'Issue #',
			'Name',
			'Commit Hash',
			'Created'
			)
		);
		
		foreach( $versions as $version ):
			
			print $this->Html->tableCells( array(
					$this->Html->link('#'.$version['Version']['id'],array('controller'=>'versions','action'=>'view',$version['Version']['id'])),
					$version['Version']['name'],
					$version['Version']['commit'],
					$this->Time->nice($version['Version']['created'])
				)
			);
			
		endforeach;
		?>
		</table>
	</div>
	<hr />
	<div class="issues">
		<small>All Issues (<?php print $this->Html->link('New Issue','/issues/add');?>)</small>
		<table>
		<?php
		
		print $this->Html->tableHeaders( array(
			'Issue #',
			'Title',
			'Status',
			'Assigned',
			'Modified'
			)
		);
		
		foreach( $issues as $issue ):
			
			print $this->Html->tableCells( array(
					$this->Html->link('#'.$issue['Issue']['id'],array('controller'=>'issues','action'=>'view',$issue['Issue']['id'])),
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
</div>
