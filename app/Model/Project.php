<?php
App::uses('AppModel', 'Model');
class Project extends AppModel {
	var $order = array('Project.title'=>'asc');
	public $hasMany = array(
		'Daily' => array(
			'dependent' => true //true = delete child records on delete
		),
	);

	
}
?>