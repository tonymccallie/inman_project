<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> SWPP: <?php echo $project['Project']['title'] ?>
	</h3>
</div>
<div class="">
	<?php 
		echo $this->Form->create('Swpp', array('type' => 'file'));
			echo $this->Form->input('project_id',array('class' => 'span12','type' => 'hidden','value'=>$project['Project']['id']));
	?>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('report_date',array('class' => 'span4','maxYear' => date('Y'))); ?>
		</div>
		<div class="span6">
			<?php echo $this->Form->input('inspection_type',array('class'=>'span12','options'=>array(
				'14 Day Scheduled Inspection' => '14 Day Scheduled Inspection',
				'After Rainfall Event' => 'After Rainfall Event'
			))); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('last_rainfall',array('class'=>'span4','empty'=>true,'maxYear' => date('Y'))); ?>
		</div>
		<div class="span6">
			<?php echo $this->Form->input('rainfall_amount',array('class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('inspected',array('label'=>'Controls / Measures Inspected','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('corrections',array('label'=>'Comments or Corrections Required','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('additional_work',array('label'=>'Additional Work Required Due to Changed Site Conditions','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('follow_up',array('class' => 'span4','empty'=>true,'maxYear' => date('Y'))); ?>
		</div>
	</div>
	<?php echo $this->Form->end(array('label' => 'Save Report','class' => 'btn')) ?>
</div>