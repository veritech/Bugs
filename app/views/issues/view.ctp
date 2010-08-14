<div class="issues view">
	<?php printf('<div class="clip status-%s">%s</div>', strtolower($issue['Status']['name']),$issue['Status']['name']); ?>
	<small>Issue (<?php print $this->Html->link('Edit Issue','/issues/edit/'.$issue['Issue']['id'])?>)</small>
	<h2><?php print '#'. $issue['Issue']['id'];?></h2>
	<small>Title</small>
	<div class="title large"><?php print $issue['Issue']['title'];?></div>
	<small>Description</small>
	<div class="description large"><?php print $issue['Issue']['description'];?></div>
	<hr />
	<small>Created by</small>
	<div class="assigned large">
		<div class="span-1 append-1"><?php print $this->Gravatar->image($issue['Creator']['email'],array('size'=>30));?></div>
		<div class="span-20 last"><?php print $issue['Creator']['username'];?></div>
	</div>
	<hr />
	<small>Currently assigned to</small>
	<div class="assigned large">
	<div class="span-1 append-1"><?php print $this->Gravatar->image($issue['Assigned']['email'],array('size'=>30));?></div>
	<div class="span-20 last"><?php print $issue['Assigned']['username'];?></div>
	</div>
	<hr />
	<div class="annotations">
		<small>Notes</small>
		<?php foreach($annotations as $annotation): ?>
		<div class="annotation span-22">
			<div class="append-1 span-3">
			<?php 
				print $this->Gravatar->image($annotation['User']['email'],array('size'=>90)); 
			?>
			</div>
			<div class="span-17 last">
				<div style="float:right"><?php print $this->Html->link('Delete',array('plugin'=>'annotation','controller'=>'annotations','action'=>'delete',$annotation['Annotation']['id']))?></div>
				<div class="small"><?php 	print $annotation['User']['username'] .' @ '. $this->Time->nice($annotation['Annotation']['created']);?></div>
				<div><?php print $annotation['Annotation']['body']; ?></div>
			</div>
		</div>
		<?php endforeach;?>
		<hr />
		<?php print $this->element('add',array('plugin'=>'Annotation','model'=>'Issue','fk'=>$issue['Issue']['id']))?>
	</div>
	<hr/>
	<div class="history">
		<small>Issue history</small>
		<?php
			if( count($diff['Issue']['revision_id']) < 1 ){
				print '<div class="box large">No History</div>';
			}
		?>
		<?php foreach( $diff['Issue']['revision_id'] as $key=>$val ): ?>
			<?php
			$output = array();
			//print $diff['Issue']['revision_created'][$key];
			//Title
			if( is_array($diff['Issue']['title']) && array_key_exists($key,$diff['Issue']['title']) ){
				$output[] = 'Title changed';
			}
			//description
			if( is_array($diff['Issue']['description']) && array_key_exists($key,$diff['Issue']['description']) ){
				$output[] = 'Description changed';
			}
			//status
			if( is_array($diff['Issue']['status_id']) && array_key_exists($key,$diff['Issue']['status_id']) ){
				$output[] = 'Status changed';
			}
			if( is_array($diff['Issue']['assigned_id']) && array_key_exists($key,$diff['Issue']['assigned_id']) ){
				$output[] = 'Assigned changed'; 
			}
			
			if( count($output) > 0 && array_key_exists($key,$diff['Issue']['revision_created']) && $diff['Issue']['revision_created'][$key] != null  ):
			?>
			<div class="box"><?php print $this->Time->nice( $diff['Issue']['revision_created'][$key]) .'<hr/>'. implode('<br/>',$output)?></div>
			<?php endif;?>
		<?php endforeach;?>
		<?php //debug($diff)?>
	</div>
</div>
