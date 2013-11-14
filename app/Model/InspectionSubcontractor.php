<?php
App::uses('AppModel', 'Model');
class InspectionSubcontractor extends AppModel {
	public $useTable = 'inspections_subcontractors';
	public $belongsTo = array(
		'Inspection' => array(
			'className' => 'Inspection',
			'foreignKey' => 'inspection_id'
		),
		'Subcontractor' => array(
			'className' => 'Subcontractor',
			'foreignKey' => 'subcontractor_id'
		),
	);

	
}
?>