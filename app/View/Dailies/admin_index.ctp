<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Daily Reports
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('Add Daily', array('action' => 'add'),array('class'=>'btn','escape'=>false)); ?>
		</div>
	</h3>
</div>
<div class="">
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
				<td><?php echo $this->Html->link($daily['Daily']['report_date'],array('action'=>'edit',$daily['Daily']['id'])) ?></td>
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