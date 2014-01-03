<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> SWPP Reports
		<div class="btn-group pull-right">
			<?php //echo $this->Html->link('Add Swpp', array('action' => 'add'),array('class'=>'btn','escape'=>false)); ?>
		</div>
	</h3>
</div>
<div class="">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('report_date','<i class="icon-sort"></i> SWPP Date',array('escape'=>false)); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('project_id','<i class="icon-sort"></i> Project',array('escape'=>false)); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($swpps as $swpp): ?>
			<tr>
				<td><?php echo $this->Html->link($swpp['Swpp']['report_date'],array('action'=>'edit',$swpp['Swpp']['id'])) ?></td>
				<td><?php echo $this->Html->link($swpp['Project']['title'],array('action'=>'edit',$swpp['Swpp']['id'])) ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php echo $this->element('paging') ?>
</div>