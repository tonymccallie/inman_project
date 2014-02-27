<div class="span12">
	<div class="well">
		<h1>Welcome</h1>
		<p>Click below to create a new report</p>
		<div class="btn-group btn-group-vertical">
			<?php echo $this->Html->link('New Daily Report','/dailies/add',array('class' => 'btn btn-large btn-primary')) ?>
			<?php echo $this->Html->link('New Inspection','/inspections/add',array('class' => 'btn btn-large btn-primary')) ?>
			<?php echo $this->Html->link('New SWPPP','/swpps/add',array('class' => 'btn btn-large btn-primary')) ?>
		</div>
	</div>
</div>