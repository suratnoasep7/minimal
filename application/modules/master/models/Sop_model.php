<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sop_model extends BF_Model
{
    /** @var string Name of the users table. */
    protected $table_name   = 'sop';
	
    public function __construct()
    {
        parent::__construct();
        $this->docs = $this->load->database('docs', TRUE);
    }

    public function getAll()
    {
        $this->docs->select("*");
        $this->docs->from("sop");
        $this->docs->where("deleted", 0);
        return $this->docs->get()->result();
    }    
}
