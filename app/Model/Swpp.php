<?php
App::uses('AppModel', 'Model');
class Swpp extends AppModel {
	public $belongsTo = array(
		'User','Project'
	);
}
?>