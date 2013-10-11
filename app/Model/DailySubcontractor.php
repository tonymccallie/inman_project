<?php
App::uses('AppModel', 'Model');
class DailySubcontractor extends AppModel {
	public $useTable = 'dailies_subcontractors';
	public $belongsTo = array(
		'Daily','Subcontractor'
	);
	var $validate = array(
		'subcontractor_id' => array(
			'ruleName' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please choose a subcontractor'
			)
		)
	);
}
?>