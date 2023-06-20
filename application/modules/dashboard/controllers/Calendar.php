<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends Corporate_Controller
{

	var $module_path = '/hrd';
	var $controller_path = '/dashboard';

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
		die(var_dump($data));
	}

	public function session()
	{
		die(var_dump($this->session->userdata()));
	}

	public function cookie()
	{
       	die(var_dump($this->input->cookie()));
	}

	public function set_cookie()
	{
  		$cookie= array(
           'name'   => 'bf_session',
           'value'  => 'f78e632c4bd114a2abbe72a4fe1ffc643bb53f7e',                            
           'expire' => '3000',                                                                                   
           'secure' => TRUE
      	);
       	$this->input->set_cookie($cookie);
	}	
}
