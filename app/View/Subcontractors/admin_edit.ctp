<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Edit Subcontractor
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('<i class="icon-trash"></i> ', array('action' => 'delete', $this->data['Subcontractor']['id']), array('escape'=>false,'class'=>'btn'),'Are you sure you want to delete this Subcontractor?'); ?>
		</div>
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('id',array());
			echo $this->Form->input('title',array('class'=>'span12'));
		echo $this->Form->end(array('label'=>'Save Subcontractor','class'=>'btn'));
	?>
</div>