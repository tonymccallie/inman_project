<?php
App::uses('AppModel', 'Model');
class DailyContractor extends AppModel {
	public $useTable = 'contractors_dailies';

	public $belongsTo = array(
		'Daily',
		'Contractor' => array(
			'className' => 'Subcontractor',
			'foreignKey' => 'subcontractor_id'
		),
	);
}
?>