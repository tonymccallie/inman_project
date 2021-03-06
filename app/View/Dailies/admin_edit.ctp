<script type="text/javascript">
/* <![CDATA[ */
var intCount = 1000;
var subcontractors = '<?php echo str_replace("\n",'',$this->Form->input('DailySubcontractor.REPLACE.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class'=>'span12'))); ?>';
$(document).ready(function() {
	$('.del_row').on('click',function() {
		href = $(this).attr('href');
		$(href).remove();
		return false;
	});
	
	$('#add_subcontractor').click(function() {
		html =  '\
		<div id="contractor'+intCount+'" >\
			<div class="row-fluid">\
				<div class="span4">'+subcontractors.replace('REPLACE',intCount)+'</div>\
				<div class="span1">\
					<input name="data[DailySubcontractor]['+intCount+'][crew_size]" class="span12 crewsize" type="number" value="" id="DailyContractor0Equipment"/>\
				</div>\
				<div class="span7">\
					<div class="input-append span12">\
						<input name="data[DailySubcontractor]['+intCount+'][equipment]" class="span12" type="text" value="" id="DailyContractor0Equipment"/>\
					</div>\
				</div>\
			</div>\
			<div class="row-fluid">\
				<div class="span12">\
					<label for="DailySubcontractor0WorkCompleted">Work Completed</label><input name="data[DailySubcontractor]['+intCount+'][work_completed]" class="span12" type="text" value="" id="DailyContractor0WorkCompleted"/>\
				</div>\
			</div>\
		</div>';
		intCount++;
		$('#subcontractor_list').append(html);
		return false;
	});
	
	$('.crewsize').on('change',function() {
		updateWorkforce();
	});
	
	updateWorkforce();
});

var updateWorkforce = function() {
	var intCrew = 0;
	$('.crewsize').each(function(index,item){
		var value = $(item).val();
		if(value !== '') {
			intCrew = intCrew + parseInt(value);
		}
	});
	$('#DailyWorkforceTotal').val(intCrew);
}

/* ]]> */
</script>
<div class="admin_header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link('<i class="icon-trash"></i> ', array('action' => 'delete', $this->data['Daily']['id']), array('escape'=>false,'class'=>'btn'),'Are you sure you want to delete this Project?'); ?>
	</div>
	<h3>
		<i class="icon-edit"></i> Edit Daily Project Report: <?php echo $this->data['Project']['title'] ?>
	</h3>
</div>
<div class="">
	<?php 
		echo $this->Form->create('Daily', array('type' => 'file'));
			echo $this->Form->input('project_id',array('class'=>'span12','type'=>'hidden','value'=>$this->data['Project']['id']));
			echo $this->Form->input('id',array());
	?>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('report_date',array('class'=>'span4','maxYear' => date('Y'))); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span2">
			<?php
				echo $this->Form->input('conditions',array('class'=>'span12'));
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
	</div>
	<div class="row-fluid">
		<div class="span3">
			<label>&nbsp;</label>
			<?php echo $this->ExtendedForm->checkbox('weather_delay',array('label'=>'Weather related delay?','type'=>'checkbox')); ?>
		</div>
		<div class="span9">
			<?php echo $this->Form->input('weather_descr',array('label'=>'Describe affect to critical path','type'=>'text','class'=>'span12')); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<h4>Subcontractor</h4>
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
			<div id="subcontractor<?php echo $k ?>">
				<div class="row-fluid">
					<div class="span4">
						<?php echo $this->Form->input('DailySubcontractor.'.$k.'.id'); ?>
						<?php echo $this->Form->input('DailySubcontractor.'.$k.'.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class'=>'span12')); ?>
					</div>
					<div class="span1">
						<?php echo $this->Form->input('DailySubcontractor.'.$k.'.crew_size',array('label'=>false, 'class'=>'span12 crewsize','type'=>'number')); ?>
					</div>
					<div class="span7">
						<div class="input-append span12">
							<?php echo $this->Form->input('DailySubcontractor.'.$k.'.equipment',array('label'=>false, 'class'=>'span11','type'=>'text','div'=>false)); ?>
							<a href="#subcontractor<?php echo $k ?>" class="btn del_row"><i class="icon-trash"></i></a>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php echo $this->Form->input('DailySubcontractor.'.$k.'.work_completed',array('class'=>'span12')); ?>
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
			<?php echo $this->Form->input('workforce_total',array()); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<h4>Pictures</h4>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_1'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_1']),'/uploads/'.$this->data['Daily']['picture_1'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_2'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_2']),'/uploads/'.$this->data['Daily']['picture_2'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_3'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_3']),'/uploads/'.$this->data['Daily']['picture_3'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_4'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_4']),'/uploads/'.$this->data['Daily']['picture_4'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_5'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_5']),'/uploads/'.$this->data['Daily']['picture_5'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Daily']['picture_6'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Daily']['picture_6']),'/uploads/'.$this->data['Daily']['picture_6'],array('target'=>'_blank','escape'=>false)):'' ?>
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