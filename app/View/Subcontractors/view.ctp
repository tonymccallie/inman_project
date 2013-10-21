<div class="well span8 offset2">
	<h3>
		<i class="icon-wrench"></i> <?php echo $subcontractor['Subcontractor']['title'] ?>
	</h3>
	<p>
		<?php echo $subcontractor['Subcontractor']['address'] ?><br />
		<?php echo $subcontractor['Subcontractor']['city'] ?>, <?php echo $subcontractor['Subcontractor']['state'] ?>  <?php echo $subcontractor['Subcontractor']['zip'] ?><br />
	</p>
	<p>
		Phone: <?php echo $subcontractor['Subcontractor']['phone'] ?><br />
		Fax: <?php echo $subcontractor['Subcontractor']['fax'] ?><br />
		Email 1: <?php echo $this->Html->link($subcontractor['Subcontractor']['email1'],'mailto:'.$subcontractor['Subcontractor']['email1']) ?><br />
		<?php if(!empty($subcontractor['Subcontractor']['email2'])): ?>
		Email 2: <?php echo $this->Html->link($subcontractor['Subcontractor']['email2'],'mailto:'.$subcontractor['Subcontractor']['email2']) ?><br />
		<?php endif ?>
	</p>
	<p>
		Notes:<br />
		<?php echo $subcontractor['Subcontractor']['notes'] ?>
	</p>
</div>