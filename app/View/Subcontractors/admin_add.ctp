<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Add Subcontractor
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('title',array('class'=>'span12'));
			echo $this->Form->input('address',array('class'=>'span12'));
			echo $this->Form->input('city',array('class'=>'span12'));
			echo $this->Form->input('state',array('options'=>Common::states(),'class'=>'span12'));
			echo $this->Form->input('zip',array('class'=>'span12'));
			echo $this->Form->input('contact',array('class'=>'span12'));
			echo $this->Form->input('phone',array('class'=>'span12'));
			echo $this->Form->input('fax',array('class'=>'span12'));
			echo $this->Form->input('email1',array('class'=>'span12'));
			echo $this->Form->input('email2',array('class'=>'span12'));
			echo $this->Form->input('notes',array('class'=>'span12'));
		echo $this->Form->end(array('label'=>'Add Subcontractor','class'=>'btn'));
	?>
</div>