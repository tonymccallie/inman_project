<?php
App::uses('FormHelper', 'View/Helper');
class ExtendedFormHelper extends FormHelper {
	var $helpers = array('Form');
	public function radio($fieldName, $options = array()) {
		$options['legend'] = false;
		//$options['before'] = ;
		//$options['label'] = false;
		$out = $this->Form->input($fieldName, $options);
		$out = str_ireplace('<label ', '<label class="btn icon-" ', $out);
		$out = str_ireplace('<div class="input radio">', '<div class="input radio"><label>'.$options['label'].'</label><br />', $out);
		$out = str_ireplace('<div class="input radio required error">', '<div class="input radio required error"><label>'.$options['label'].'</label><br />', $out);
		$out = str_ireplace('<div class="input radio required">', '<div class="input radio required"><label>'.$options['label'].'</label><br />', $out);
		return $this->output($out);
	}
	
	public function checkbox($fieldName, $options = array()) {
		//$options['before'] = ;
		//$options['label'] = false;
		$out = $this->Form->input($fieldName, $options);
		$out = str_ireplace('<label ', '<label class="btn icon-" ', $out);
		$out = str_ireplace('<div class="input checkbox">', '<div class="input checkbox">', $out);
		$out = str_ireplace('<div class="input checkbox required">', '<div class="input checkbox required">', $out);
		return $this->output($out);
	}

}
?>