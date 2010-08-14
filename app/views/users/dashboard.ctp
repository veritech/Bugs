<div class="users dashboard">
	<div class="prepend-1 span-22 append-1 large">
		Have a look at what's cracking.
	</div>
	<div class="prepend-1 span-6">
		<h2>My Bugs</h2>
		<div class="list">
		<?php 
		foreach( $assignedIssues as $issue ):
			
			printf(
				'<div class="box status-%s">#%d %s -> %s</div>',
				strtolower($issue['Status']['name']),
				$issue['Issue']['id'],				
				$this->Html->link($issue['Issue']['title'],'/issues/view/'.$issue['Issue']['id']),
				$issue['Status']['name']
			);
			
		endforeach; 
		?>
		</div>
	</div>
	<div class="prepend-1 span-6">
		<h2>New Bugs</h2>
		<?php
		
		if( count($newIssues) < 1 ){
			print 'Nothiing to see here';
		}
		foreach( $newIssues as $issue ):
			
			printf(
				'<div class="box status-%s">#%d %s -> %s</div>',
				strtolower($issue['Status']['name']),
				$issue['Issue']['id'],
				$this->Html->link($issue['Issue']['title'],'/issues/view/'.$issue['Issue']['id']),
				$issue['Status']['name']
			);
			
		endforeach;
		?>
	</div>
	<div class="prepend-1 span-6 append-1 last">
		<h2>Updated Bugs</h2>
		<?php
		
		if( count($updatedIssues) < 1 ){
			print 'Nothiing to see here';
		}
		foreach( $updatedIssues as $issue ):
			
			printf(
				'<div class="box status-%s">#%d %s -> %s</div>',
				strtolower($issue['Status']['name']),
				$issue['Issue']['id'],
				$this->Html->link($issue['Issue']['title'],'/issues/view/'.$issue['Issue']['id']),
				$issue['Status']['name']
			);
			
		endforeach;
		?>
	</div>
	</div>
</div>