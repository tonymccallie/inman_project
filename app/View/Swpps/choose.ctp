<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> SWPP Report
	</h3>
</div>
<div class="row-fluid">
	<div class="span6 offset3">
		<p>Which Project are you working on?</p>
	</div>
</div>
<?php foreach($projects as $id => $project): ?>
<div class="row-fluid">
	<div class="span6 offset3">
		<div class="pull-right btn-group">
			<?php echo $this->Html->link('New SWPP','/swpps/add/'.$id,array('escape' => false,'class'=>'btn')) ?>
		</div>
		<b><?php echo $project ?></b>
	</div>
</div>
<?php endforeach ?>