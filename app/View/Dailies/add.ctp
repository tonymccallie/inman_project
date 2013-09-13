<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Daily Project Report
	</h3>
</div>
<div class="">
	<?php echo $this->Form->create(); ?>
		<?php echo $this->Form->input('report_date',array('type'=>'hidden','value'=>date('Y-m-d'))); ?>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('project_id',array('class'=>'span12','empty'=>'Choose Project')); ?>
		</div>
		<div class="span3">
			<?php
				echo $this->Form->input('conditions',array('class'=>'span12','options'=>array(
					'Clear'=>'Clear',
					'Cloudy'=>'Cloudy',
					'Rain'=>'Rain',
					'Muddy'=>'Muddy'
				)));
			?>
		</div>
		<div class="span3">
			<?php
				echo $this->Form->input('precipitation_type',array('class'=>'span12','options'=>array(
					'None'=>'None',
					'Rain'=>'Rain',
					'Sleet'=>'Sleet',
					'Snow'=>'Snow'
				)));
			?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo $this->Form->input('low',array('label'=>'Low Temp (F)','class'=>'span12')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('high',array('label'=>'High Temp (F)','class'=>'span12')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('wind',array('label'=>'Avg. Wind (Mph)','class'=>'span12')); ?>
		</div>
		<div class="span3">
			<?php echo $this->Form->input('precipitation_amt',array('label'=>'Precipitation Amt. (in)','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<label>&nbsp;</label>
			<?php echo $this->ExtendedForm->checkbox('weather_delay',array('label'=>'Weather related delay?','type'=>'checkbox')); ?>
		</div>
		<div class="span9">
			<?php echo $this->Form->input('weather_descr',array('label'=>'If yes, describe','type'=>'text','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			CONTRACTORS
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			SUBCONTRACTORS
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('testing',array('label'=>'Testing performed/results received','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('surveying',array('label'=>'Surveying performed','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('accidents',array('label'=>'Work related accidents or losses','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('directives',array('label'=>'A/E or Owner Directives','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->Form->input('progress_notes',array('label'=>'Progress notes, scheduling comments','class'=>'span12')); ?>
		</div>
	</div>
	<?php echo $this->Form->end(array('label'=>'Save Report','class'=>'btn')) ?>
</div>