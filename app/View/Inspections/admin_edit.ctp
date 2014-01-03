<script type="text/javascript">
/* <![CDATA[ */
var intCount = 1000;
var subcontractors = '<?php echo str_replace("\n",'',$this->Form->input('InspectionSubcontractor.REPLACE.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class'=>'span12'))); ?>';
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
				<div class="span8">\
					<textarea name="data[InspectionSubcontractor]['+intCount+'][comments]" cols="30" rows="6" class="span12" id="InspectionContractor0Comments"></textarea>\
				</div>\
			</div>\
		</div>';
		intCount++;
		$('#subcontractor_list').append(html);
		return false;
	});
});

/* ]]> */
</script>
<div class="admin_header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link('<i class="icon-trash"></i> ', array('action' => 'delete', $this->data['Inspection']['id']), array('escape'=>false,'class'=>'btn'),'Are you sure you want to delete this Project?'); ?>
	</div>
	<h3>
		<i class="icon-edit"></i> Safety Inspection Report: <?php echo $this->data['Project']['title'] ?>
	</h3>
</div>
<div class="">
	<?php 
		echo $this->Form->create('Inspection', array('type' => 'file'));
			echo $this->Form->input('project_id',array('class'=>'span12','type'=>'hidden','value'=>$this->data['Project']['id']));
			echo $this->Form->input('id',array());
	?>
	<div class="row-fluid">
		<div class="span6">
			<?php echo $this->Form->input('inspection_date',array('class'=>'span4')); ?>
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
	<?php
		$categories = array(
			'Protective Equipment' => array(
				'hard_hats' => 'Hard Hats Worn',
				'eye_protection' => 'Eye / Face Protection as Required',
				'footwear' => 'Proper Footwear',
				'body_harness' => 'Body Harness',
				'safety_vest' => 'Safety Vest'
			),
			'First Aid & Emergency' => array(
				'first_aid' => 'First Aid Supplies',
				'msds' => 'MSDS / Hazard Communication',
				'cpr' => 'CPR Certified Personnel'
			),
			'Excavation & Shoring' => array(
				'shoring' => 'Shoring or Sloping',
				'spoil' => 'Spoil Bank',
				'ladder' => 'Ladder Available',
				'competent' => 'Competent Person'
			),
			'Highway Equipment' => array(
				'back_up_alarms' => 'Back Up Alarms / Horns',
				'seat_belts' => 'Seat Belts',
				'windows' => 'Windows',
			),
			'Electrical / Handtools' => array(
				'extension_cords' => 'Extension Cords / GFCI\'s',
				'power_tools' => 'Power Tools / Guards',
				'tool_handles' => 'Tool Handles'
			),
			'Scaffolds / Fall Protection' => array(
				'fully_decked' => 'Fully Decked / Guardrails',
				'construction' => 'Construction',
				'scaffold_training_docs' => 'Training Documentation',
			),
			'Cranes' => array(
				'annual_cert' => 'Annual Inspection Certificate',
				'load_charts' => 'Load Charts / Angle Indic.',
				'power_lines' => 'Power Lines'
			),
			'Fuel Storage' => array(
				'safety_cans' => 'Safety Cans Condition',
				'fire_ext' => 'Fire Extinguishers',
			),
			'Aerial Lifts' => array(
				'safety_chain' => 'Safety Chain',
				'lift_training_docs' => 'Training Documentation'
			),
			'Housekeeping & Sanitation' => array(
				'housekeeping' => 'Housekeeping',
				'drinking_water' => 'Drinking Water / Cups'
			),
			'Ladders' => array(
				'tied_off' => 'Tied Off / 3\' Above Landing',
				'proper_condition' => 'Proper Condition / Placement',
			),
			'Oxygen / Acetylene Bottles' => array(
				'stored_upright' => 'Stored Upright & Secured',
				'gauges' => 'Gauges / Hoses',
			),
			
		)
	?>
	<div class="row-fluid">
		<?php 
			$row = 0;
			foreach($categories as $k => $questions): 
				if($row == 2) {
					echo '</div><div class="row-fluid">';
					$row = 0;
				}
				$row++;
		?>
		<div class="span6">
			<h6><?php echo $k ?></h6>
			<?php foreach($questions as $field => $question): ?>
				<?php echo $this->ExtendedForm->radio($field,array('label'=>$question,'type'=>'radio','options'=>array(
					'OK' => 'OK',
					'AN' => 'AN',
					'NA' => 'NA',
				))); ?>
			<?php endforeach ?>
		</div>
		<?php endforeach ?>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<h5>Subcontractor</h5>
		</div>
		<div class="span8">
			<h5>Describe Hazard in Detail / Corrective Action</h5>
		</div>
	</div>
	<div id="subcontractor_list">
		<?php foreach($this->data['InspectionSubcontractor'] as $k => $subcontractor): ?>
			<div id="subcontractor<?php echo $k ?>">
				<div class="row-fluid">
					<div class="span4">
						<?php echo $this->Form->input('InspectionSubcontractor.'.$k.'.id'); ?>
						<?php echo $this->Form->input('InspectionSubcontractor.'.$k.'.subcontractor_id',array('label'=>false, 'options'=>$subcontractors,'empty' => true,'class' => 'span12')); ?>
					</div>
					<div class="span8">
						<?php echo $this->Form->input('InspectionSubcontractor.'.$k.'.comments',array('label'=>false, 'class' => 'span11','type' => 'textarea','div'=>false)); ?>
						<a href="#subcontractor<?php echo $k ?>" class="btn del_row pull-right"><i class="icon-trash"></i></a>
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
			<h4>Pictures</h4>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_1'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_1']),'/uploads/'.$this->data['Inspection']['picture_1'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_2'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_2']),'/uploads/'.$this->data['Inspection']['picture_2'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_3'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_3']),'/uploads/'.$this->data['Inspection']['picture_3'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_4'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_4']),'/uploads/'.$this->data['Inspection']['picture_4'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_5'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_5']),'/uploads/'.$this->data['Inspection']['picture_5'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($this->data['Inspection']['picture_6'])?$this->Html->link($this->Html->image('/uploads/'.$this->data['Inspection']['picture_6']),'/uploads/'.$this->data['Inspection']['picture_6'],array('target'=>'_blank','escape'=>false)):'' ?>
		</div>
	</div>
	<?php echo $this->Form->end(array('label'=>'Save Report','class'=>'btn')) ?>
</div>