<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Inspection Reports
		<div class="btn-group pull-right">
			<?php //echo $this->Html->link('Add Inspection', array('action' => 'add'),array('class'=>'btn','escape'=>false)); ?>
		</div>
	</h3>
</div>
<div class="">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('inspection_date','<i class="icon-sort"></i> Inspection Date',array('escape'=>false)); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('project_id','<i class="icon-sort"></i> Project',array('escape'=>false)); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($inspections as $inspection): ?>
			<tr>
				<td><?php echo $this->Html->link($inspection['Inspection']['inspection_date'],array('action'=>'edit',$inspection['Inspection']['id'])) ?></td>
				<td><?php echo $this->Html->link($inspection['Project']['title'],array('action'=>'edit',$inspection['Inspection']['id'])) ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php echo $this->element('paging') ?>
</div>