<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Corporate_Controller
{

	var $module_path = '/dashboard';
	var $controller_path = '/dashboard';

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(false);
		// $this->config->load('hrd/config');
		// $this->load->helper('html');
		// if(isset($_GET['token']))
		// {
	  	// 	$cookie= array(
	    //        'name'   => 'bf_session',
	    //        'value'  => $_GET['token'],                            
	    //        'expire' => '3000',                                                                                   
	    //        'secure' => TRUE
	    //   	);
	    //    	$this->input->set_cookie($cookie);
		// }
	}

	public function index()
	{
		//print_r($this->session->userdata());
		//die();
		//die(var_dump($this->session->userdata()));

		print_r($this->session->userdata());
        die();

		
		Template::set('toolbar_title', 'Dashboard');
		Template::set_view('dashboard/index');
		Template::render();
	}

	public function js()
	{
		Template::set('toolbar_title', 'Dashboard');
		$js = $this->bhisaJS();
		Template::set('js', $js);
	}

}
