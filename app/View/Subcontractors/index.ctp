<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Subcontractors
		<div class="btn-group pull-right">
			<?php echo $this->Html->link('Add Subcontractor', array('action' => 'add'),array('class'=>'btn','escape'=>false)); ?>
		</div>
	</h3>
</div>
<div class="">
	<?php echo $this->element('search') ?>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('title','<i class="icon-sort"></i> Title',array('escape'=>false)); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($subcontractors as $subcontractor): ?>
			<tr>
				<td><?php echo $this->Html->link($subcontractor['Subcontractor']['title'],array('action'=>'view',$subcontractor['Subcontractor']['id'])) ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<?php echo $this->element('paging') ?>
</div>