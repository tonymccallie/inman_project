<?php
App::uses('AppModel', 'Model');
class Daily extends AppModel {
	var $order = array('Daily.report_date' => 'desc');
	
	public $belongsTo = array(
		'Project','User'
	);
	
	public $hasMany = array(
		'DailySubcontractor' => array(
			'dependent' => true //true = delete child records on delete
		),
	);
}
?>