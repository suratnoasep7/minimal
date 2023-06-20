<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Front Controller
 *
 * This class provides a common place to handle any tasks that need to
 * be done for all public-facing controllers.
 *
 * @package    kioslinecom\Core\Controllers
 * @category   Controllers
 * @author     kioslinecom Dev Team
 * @link       http://guides.cikioslinecom.com/helpers/file_helpers.html
 *
 */
class Antrian_Controller extends Base_Controller
{

    //--------------------------------------------------------------------

    /**
     * Class constructor
     *
     */
    public function __construct()
    {
    	parent::__construct();
    	Events::trigger('before_front_controller');

    	$this->load->library('template');
    	$this->load->library('assets');

    	$this->set_current_user();

    	Events::trigger('after_front_controller');
    	Template::set_theme('antrian');
    }//end __construct()

}

/* End of file Front_Controller.php */
/* Location: ./application/core/Front_Controller.php */