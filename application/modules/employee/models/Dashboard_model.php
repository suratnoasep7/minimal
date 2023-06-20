<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends BF_Model
{
    /** @var string Name of the users table. */
    protected $table_name   = 'calendar';
	
    public function __construct()
    {
        parent::__construct();
        $this->hr = $this->load->database('hr', TRUE);
    }

    public function ambil()
    {
        $sql    = "SELECT * from calendar";
        $query  = $this->hr->query($sql);   
        if ($query->num_rows())
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}
