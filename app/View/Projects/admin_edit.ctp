<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Edit Project
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('<i class="icon-trash"></i> ', array('action' => 'delete', $this->data['Project']['id']), array('escape'=>false,'class'=>'btn'),'Are you sure you want to delete this Project?'); ?>
		</div>
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('id',array());
			echo $this->Form->input('title',array('class'=>'span12'));
			echo $this->Form->input('zip',array('class'=>'span12'));
			echo $this->Form->input('emails',array('class'=>'span12','label'=>'Emails to receive reports: <i>(comma separated)</i>','escape'=>false));
		echo $this->Form->end(array('label'=>'Save Project','class'=>'btn'));
	?>
</div>