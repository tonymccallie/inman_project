<?php
App::uses('AppModel', 'Model');
class DailySubcontractor extends AppModel {
	public $useTable = 'dailies_subcontractors';
	public $belongsTo = array(
		'Daily','Subcontractor'
	);
}
?>