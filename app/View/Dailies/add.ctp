<script type="text/javascript">
/* <![CDATA[ */
var intCount = 1000;
var contractors = '<?php echo str_replace("\n",'',$this->Form->input('DailyContractor.REPLACE.contractor_id',array('label'=>false, 'options'=>$contractors,'empty' => true,'class'=>'span12'))); ?>';
var subcontractors = '<?php echo str_replace("\n",'',$this->Form->input('DailySubcontractor.REPLACE.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class'=>'span12'))); ?>';
$(document).ready(function() {
	$('.del_row').on('click',function() {
		alert('me');
		href = $(this).attr('href');
		$(href).remove();
		return false;
	});
	
	$('#add_contractor').click(function() {
		html =  '\
		<div id="contractor'+intCount+'" class="row-fluid">\
			<div class="span4">'+contractors.replace('REPLACE',intCount)+'</div>\
			<div class="span8">\
				<div class="input-append span12">\
					<input name="data[DailyContractor]['+intCount+'][equipment]" class="span12" type="text" value="" id="DailyContractor0Equipment"/>\
				</div>\
			</div>\
		</div>\
		';
		intCount++;
		$('#contractor_list').append(html);
		return false;
	});
	
	$('#add_subcontractor').click(function() {
		html =  '\
		<div id="contractor'+intCount+'" class="row-fluid">\
			<div class="span4">'+subcontractors.replace('REPLACE',intCount)+'</div>\
			<div class="span1">\
				<input name="data[DailySubcontractor]['+intCount+'][crew_size]" class="span12" type="number" value="" id="DailyContractor0Equipment"/>\
			</div>\
			<div class="span7">\
				<div class="input-append span12">\
					<input name="data[DailySubcontractor]['+intCount+'][equipment]" class="span12" type="text" value="" id="DailyContractor0Equipment"/>\
				</div>\
			</div>\
		</div>\
		';
		intCount++;
		$('#subcontractor_list').append(html);
		return false;
	});
});

/* ]]> */
</script>
<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Daily Project Report: <?php echo $project['Project']['title'] ?>
	</h3>
</div>
<div class="">
	<?php 
		echo $this->Form->create();
			echo $this->Form->input('report_date',array('type'=>'hidden','value'=>date('Y-m-d')));
			echo $this->Form->input('project_id',array('class'=>'span12','type'=>'hidden','value'=>$project['Project']['id']));
	?>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('report_date',array('class'=>'span4')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span2">
			<?php
				echo $this->Form->input('conditions',array('class'=>'span12'));
			?>
		</div>
		<div class="span2">
			<?php
				echo $this->Form->input('precipitation_type',array('class'=>'span12','options'=>array(
					'None'=>'None',
					'Rain'=>'Rain',
					'Sleet'=>'Sleet',
					'Snow'=>'Snow'
				)));
			?>
		</div>
		<div class="span2">
			<?php echo $this->Form->input('low',array('label'=>'Low Temp (F)','class'=>'span12')); ?>
		</div>
		<div class="span2">
			<?php echo $this->Form->input('high',array('label'=>'High Temp (F)','class'=>'span12')); ?>
		</div>
		<div class="span2">
			<?php echo $this->Form->input('wind',array('label'=>'Avg. Wind (Mph)','class'=>'span12')); ?>
		</div>
		<div class="span2">
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
		<div class="span4">
			<h6>Contractor</h6>
		</div>
		<div class="span8">
			<h6>Equipment</h6>
		</div>
	</div>
	<div id="contractor_list">
		<?php foreach($this->data['DailyContractor'] as $k => $contractor): ?>
			<div id="contractor<?php echo $k ?>" class="row-fluid">
				<div class="span4">
					<?php echo $this->Form->input('DailyContractor.'.$k.'.contractor_id',array('label'=>false, 'options'=>$contractors,'empty' => true,'class'=>'span12')); ?>
				</div>
				<div class="span8">
					<div class="input-append span12">
						<?php echo $this->Form->input('DailyContractor.'.$k.'.equipment',array('label'=>false, 'class'=>'span11','type'=>'text','div'=>false)); ?>
						<a href="#contractor<?php echo $k ?>" class="btn del_row"><i class="icon-trash"></i></a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<a href="#" id="add_contractor" class="btn"><i class="icon-plus"></i> Add Contractor</a>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<h6>Subcontractor</h6>
		</div>
		<div class="span1">
			<h6>Crew</h6>
		</div>
		<div class="span7">
			<h6>Equipment</h6>
		</div>
	</div>
	<div id="subcontractor_list">
		<?php foreach($this->data['DailySubcontractor'] as $k => $subcontractor): ?>
			<div  id="subcontractor<?php echo $k ?>" class="row-fluid">
				<div class="span4">
					<?php echo $this->Form->input('DailySubcontractor.'.$k.'.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class'=>'span12')); ?>
				</div>
				<div class="span1">
					<?php echo $this->Form->input('DailySubcontractor.'.$k.'.crew_size',array('label'=>false, 'class'=>'span12','type'=>'number')); ?>
				</div>
				<div class="span7">
					<div class="input-append span12">
						<?php echo $this->Form->input('DailySubcontractor.'.$k.'.equipment',array('label'=>false, 'class'=>'span11','type'=>'text','div'=>false)); ?>
						<a href="#subcontractor<?php echo $k ?>" class="btn del_row"><i class="icon-trash"></i></a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<a href="#" id="add_subcontractor" class="btn"><i class="icon-plus"></i> Add Subcontractor</a>
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