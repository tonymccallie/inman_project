<?php
App::uses('AppModel', 'Model');
class Subcontractor extends AppModel {
	var $order = array('Subcontractor.title'=>'asc');
	public $hasAndBelongsToMany = array(
		'Daily',
	);
}
?>