<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Daily Project Report: <?php echo $daily['Project']['title'] ?> - <?php echo date('m/d/Y',strtotime($daily['Daily']['report_date'])) ?>
	</h3>
</div>
<div class="">
	<div class="row-fluid">
		<div class="span2">
			<label>Conditions</label>
			<b><?php echo $daily['Daily']['conditions'] ?></b>
		</div>
		<div class="span2">
			<label>Low Temp (F)</label>
			<b><?php echo $daily['Daily']['low'] ?></b>
		</div>
		<div class="span2">
			<label>High Temp (F)</label>
			<b><?php echo $daily['Daily']['high'] ?></b>
		</div>
		<div class="span2">
			<label>Avg. Wind (Mph)</label>
			<b><?php echo $daily['Daily']['wind'] ?></b>
		</div>
		<div class="span2">
			<label>Precipitation Amt. (in)</label>
			<b><?php echo $daily['Daily']['precipitation_amt'] ?></b>
		</div>
		<div class="span2">
			<label>Precipitation Type</label>
			<b><?php echo $daily['Daily']['precipitation_type'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<label>Weather related delay?</label>
			<b><?php echo ($daily['Daily']['weather_delay'])?'Yes':'No' ?></b>
		</div>
		<div class="span9">
			<label>Weather delay description:</label>
			<b><?php echo $daily['Daily']['weather_descr'] ?></b>
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
		<?php foreach($daily['DailySubcontractor'] as $k => $subcontractor): ?>
			<div id="subcontractor<?php echo $k ?>">
				<div class="row-fluid">
					<div class="span4">
						<b><?php echo $subcontractors[$subcontractor['subcontractor_id']] ?></b>
					</div>
					<div class="span1">
						<b><?php echo $subcontractor['crew_size'] ?></b>
					</div>
					<div class="span7">
						<b><?php echo $subcontractor['equipment'] ?></b>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span11 offset1">
						Work Completed: <b><?php echo $subcontractor['work_completed'] ?></b>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="row-fluid">
		<div class="span12">
			Workforce Total: <b><?php echo $daily['Daily']['workforce_total'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<h4>Pictures</h4>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
			<?php echo !empty($daily['Daily']['picture_1'])?$this->Html->image('/uploads/'.$daily['Daily']['picture_1']):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($daily['Daily']['picture_2'])?$this->Html->image('/uploads/'.$daily['Daily']['picture_2']):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($daily['Daily']['picture_3'])?$this->Html->image('/uploads/'.$daily['Daily']['picture_3']):'' ?>
		</div>
		<div class="span3">
			<?php echo !empty($daily['Daily']['picture_4'])?$this->Html->image('/uploads/'.$daily['Daily']['picture_4']):'' ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<label>Testing performed/results received:</label>
			<b><?php echo $daily['Daily']['testing'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<label>Surveying performed:</label>
			<b><?php echo $daily['Daily']['surveying'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<label>Work related accidents or losses:</label>
			<b><?php echo $daily['Daily']['accidents'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<label>A/E or Owner Directives:</label>
			<b><?php echo $daily['Daily']['directives'] ?></b>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<label>Progress notes, scheduling comments:</label>
			<b><?php echo $daily['Daily']['progress_notes'] ?></b>
		</div>
	</div>
</div>