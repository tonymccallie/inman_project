<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Add Project
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('title',array('class'=>'span12'));
			echo $this->Form->input('zip',array('class'=>'span12'));
			echo $this->Form->input('emails',array('class'=>'span12','label'=>'Emails to receive reports: <i>(comma separated)</i>','escape'=>false));
		echo $this->Form->end(array('label'=>'Add Project','class'=>'btn'));
	?>
</div>