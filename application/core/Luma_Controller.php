<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Luma_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_front_controller');
        $this->load->library('template');
        $this->load->library('assets');
        $this->set_current_user();
        Events::trigger('after_front_controller');
        Template::set_theme('luma');
    }
}
