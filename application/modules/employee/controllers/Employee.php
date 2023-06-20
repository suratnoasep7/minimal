<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends Corporate_Controller
{

	var $module_path = '/employee';
	var $controller = 'employee';
	var $controller_path = '/employee';

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
		$this->config->load('hrd/config');
		$this->load->helper('html');
	}

	public function index()
	{
		Template::set('toolbar_title', 'Employee');

		Template::set_view('employee/index');
		Template::render();
	}
}
