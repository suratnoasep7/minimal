<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employeelist extends Corporate_Controller
{

	var $module_path = '/employee';
	var $controller = 'employeelist';
	var $controller_path = '/employeelist';

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
		Template::set('toolbar_title', 'Departments');
		Template::set_view('employeelist/index');
		Template::render();
	}

	public function session()
	{
		die(var_dump($this->session->userdata()));
	}
}
