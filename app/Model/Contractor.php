<?php
App::uses('AppModel', 'Model');
class Contractor extends AppModel {
	var $order = array('Contractor.title'=>'asc');
	public $hasAndBelongsToMany = array(
		'Daily',
	);
}
?>