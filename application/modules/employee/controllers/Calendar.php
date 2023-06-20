<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends Corporate_Controller
{

	var $module_path = '/employee';
	var $controller = 'calendar';
	var $controller_path = '/calendar';

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
		$this->config->load('hrd/config');
		$this->load->helper('html');
		$this->load->model('dashboard_model', null, true);
	}

	public function index()
	{
		$data = $this->dashboard_model->ambil();
		// die(var_dump($data));

		Template::set_view('calendar/index');
		Template::render();
	}

	public function session()
	{
		die(var_dump($this->session->userdata()));
	}
}
