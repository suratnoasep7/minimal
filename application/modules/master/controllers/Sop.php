<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sop extends Corporate_Controller
{
	var $module_path = '/master';
	var $controller = 'sop';
	//--------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sop_model', null, true);
		$this->output->enable_profiler(false);
	}

	public function index()
	{
		Template::set('toolbar_title', 'Master SOP');
		$sop_list = $this->sop_model->getAll();
		Template::set('sop_list', $sop_list);
		Template::render();
	}
}