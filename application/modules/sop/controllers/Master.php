<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master extends Corporate_Controller
{
	var $module_path = '/master';
	var $controller = 'master';
	//--------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
	}
}