<?php
class SeoComponent extends Object {

	var $buildTitle = true;
	
	var $controller = null;
	
	var $titleComponents = array();
	
	var $separator = ' | ';
	
	function buildTitle()
	{
		$this->titleComponents[] = $this->controller->pageTitle;
		$this->titleComponents[] = 'Synodic Solutions';
		$this->controller->set('title', implode($this->separator, $this->titleComponents));
	}
	
	function beforeRender(&$controller)
	{
		$this->controller = &$controller;
		if($this->buildTitle)
			$this->buildTitle();
	}
}
?>