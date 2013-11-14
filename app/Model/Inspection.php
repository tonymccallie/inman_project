<?php
App::uses('AppModel', 'Model');
class Inspection extends AppModel {
	public $hasMany = array(
		'InspectionSubcontractor' => array(
			'className' => 'InspectionSubcontractor',
			'foreignKey' => 'inspection_id',
			'order' => '',
			'dependent' => true //true = delete child records on delete
		),
	);
	
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id'
		),
	);
	
}
?>