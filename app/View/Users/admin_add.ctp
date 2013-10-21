<div class="admin_header">
	<h3>
		<i class="icon-edit"></i> Add User
	</h3>
</div>
<div class="">
	<?php
		echo $this->Form->create();
			echo $this->Form->input('email',array('class'=>'span12'));
			echo $this->Form->input('passwd', array('label' => 'Password','class'=>'span12')); 
			echo $this->Form->input('passwd_verify',array('type'=>'password','label' => 'Password Verify','class'=>'span12'));
			echo $this->Form->input('role_id',array('class'=>'span12'));
		echo $this->Form->end(array('label'=>'Add User','class'=>'btn'));
	?>
</div>