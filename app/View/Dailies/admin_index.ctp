<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Daily Reports
	</h3>
</div>
<div class="">
	<div class="row-fluid">
		<div class="span3">
			<?php
				echo $this->Form->create();
					echo $this->Form->input('weather',array('class'=>'span12','options'=>array(
						1 => 'Weather Delay',
						0 => 'No Weather Delay'
					), 'empty' => 'All Weather'));
					echo $this->Form->input('project',array('class'=>'span12','options'=>$projects, 'empty' => 'All Projects'));
					echo $this->Form->input('date',array('class'=>'span6','type'=>'date','dateFormat'=>'MY','empty'=>true,'maxYear' => date('Y')));
				echo $this->Form->end(array('label'=>'Filter','class'=>'btn btn-block'));
			?>
		</div>
		<div class="span9">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>
							<?php echo $this->Paginator->sort('report_date','<i class="icon-sort"></i> Report Date',array('escape'=>false)); ?>
						</th>
						<th>
							<?php echo $this->Paginator->sort('project_id','<i class="icon-sort"></i> Project',array('escape'=>false)); ?>
						</th>
						<th>
							Controls
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($dailies as $daily): ?>
					<tr>
						<td><?php echo $this->Html->link($daily['Daily']['report_date'],array('action'=>'edit',$daily['Daily']['id'])) ?> <?php echo !empty($daily['Daily']['weather_delay'])?'(W)':'' ?></td>
						<td><?php echo $this->Html->link($daily['Project']['title'],array('action'=>'edit',$daily['Daily']['id'])) ?></td>
						<td>
							<div class="btn-group pull-right">
								<?php echo $this->Html->link('<i class="icon-edit"></i> Edit',array('action'=>'edit',$daily['Daily']['id']),array('class'=>'btn','escape'=>false)) ?>	
								<?php echo $this->Html->link('<i class="icon-search"></i> View',array('action'=>'view',$daily['Daily']['id'],'admin'=>false),array('class'=>'btn','escape'=>false)) ?>	
							</div>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
			<?php echo $this->element('paging') ?>
		</div>
	</div>
</div>