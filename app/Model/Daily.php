<?php
App::uses('AppModel', 'Model');
class Daily extends AppModel {
	var $order = array('Daily.report_date' => 'desc');
	
	public $belongsTo = array(
		'Project','User'
	);
	
	public $hasAndBelongsToMany = array(
		'Contractor','Subcontractor'
	);
}
?>