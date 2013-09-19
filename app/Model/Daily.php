<?php
App::uses('AppModel', 'Model');
class Daily extends AppModel {
	var $order = array('Daily.report_date' => 'desc');
	
	public $belongsTo = array(
		'Project','User'
	);
	
	public $hasMany = array(
		'DailyContractor' => array(
			'dependent' => true //true = delete child records on delete
		),
		'DailySubcontractor' => array(
			'dependent' => true //true = delete child records on delete
		),
	);
	
	public $hasAndBelongsToMany = array(
		'Contractor','Subcontractor'
	);
}
?>