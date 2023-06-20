<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Corporate_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        Events::trigger('before_front_controller');
        $this->load->library('template');
        $this->load->library('assets');
        $this->set_current_user();
        Events::trigger('after_front_controller');
        Template::set_theme('docy');
    }

    public function dropdown_opt_generate($opt_name = "", $opt_key = "", $opt_caption = "", $opt_table = "", $opt_add = "", $opt_condition = "", $opt_select2 = FALSE, $opt_all = FALSE, $opt_order = "", $opt_tambah1 = "", $opt_tambah2 = "")
    {
        if (empty($opt_name)) {
            return FALSE;
        }
        if (empty($opt_key)) {
            return FALSE;
        }
        if (empty($opt_caption)) {
            return FALSE;
        }
        if (empty($opt_table)) {
            return FALSE;
        }

        if ($opt_select2 === TRUE) {
            $list[''] = '';
        } else {
            $list[''] = 'Pilih';
        }
        if ($opt_all == TRUE) {
            $list['all'] = 'ALL';
        }
        $this->db->select($opt_key);
        $this->db->select($opt_caption);
        if (!empty($opt_add)) {
            $this->db->select($opt_add);
        }
        if (!empty($opt_tambah1)) {
            $this->db->select($opt_tambah1);
        }
        if (!empty($opt_tambah2)) {
            $this->db->select($opt_tambah2);
        }
        $this->db->from($opt_table);
        if (!empty($opt_condition)) {
            $this->db->where($opt_condition);
        }
        if (!empty($opt_order)) {
            $this->db->order_by($opt_order);
        }
        $query = $this->db->get()->result_array();
        if (!empty($opt_add)) {
            foreach ($query as $row) {
                $list[$row[$opt_key]] = addslashes($row[$opt_add]) . " - " . addslashes($row[$opt_caption]);
            }
        } else if (!empty($opt_tambah1)) {
            foreach ($query as $row) {
                $list[$row[$opt_key]] = addslashes($row[$opt_caption]) . " <> " . addslashes($row[$opt_tambah1]) . " - " . addslashes($row[$opt_tambah2]);
            }
        } else {
            foreach ($query as $row) {
                $list[$row[$opt_key]] = addslashes($row[$opt_caption]);
            }
        }

        Template::set($opt_name, $list);
    }

    public function dropdown_optgroup_generate($opt_name = "", $opt_key = "", $opt_caption = "", $opt_table = "", $opt_group = "", $opt_order = "", $opt_add = "", $opt_condition = "")
    {
        if (empty($opt_name)) {
            return FALSE;
        }
        if (empty($opt_key)) {
            return FALSE;
        }
        if (empty($opt_caption)) {
            return FALSE;
        }
        if (empty($opt_table)) {
            return FALSE;
        }


        $this->db->select($opt_key . ' as value');
        $this->db->select($opt_caption . ' as caption');
        if (!empty($opt_group)) {
            $this->db->select($opt_group . ' as group');
        }

        if (!empty($opt_add)) {
            $this->db->select($opt_add);
        }
        $this->db->from($opt_table);
        if (!empty($opt_condition)) {
            $this->db->where($opt_condition);
        }
        if (!empty($opt_group)) {
            $this->db->order_by($opt_group, 'asc');
        }
        if (!empty($opt_order)) {
            $this->db->order_by($opt_order, 'asc');
        }

        $query = $this->db->get()->result_array();
        $list = $query;
        Template::set($opt_name, $list);
    }

    function kode_nomor_ambil($kode)
    {
        $query = $this->db->select('nomor')->from('y_pengkodean')->where('kode', $kode)->get()->row();
        return $query->nomor;
    }

    function kode_nomor_update($kode, $nobaru)
    {
        if ($this->db->update('y_pengkodean', array('nomor' => $nobaru), array('kode' => $kode))) {
            return true;
        }
        return false;
    }

    public function getdata_select2($mtable, $mvalue, $mtext, $mawhere = null)
    {
        $merror   = "";
        $madata   = array();
        $this->db->select('*');
        $this->db->from($mtable);
        if ($mawhere != NULL) {
            $this->db->where($mawhere);
        }
        $mdata    = $this->db->get()->result();
        foreach ($mdata as $row) {
            $marray = array(
                "id"      => $row->$mvalue,
                "text"    => $row->$mtext,
                "selected" => false
            );
            array_push($madata, $marray);
        }
        $madata = $madata;
        return json_encode($madata);
    }


    function ambilNomorKode($kode)
    {
        $query = $this->db->select('nomor')->from('pengkodean')->where('kode', $kode)->get()->row();
        return $query->nomor;
    }

    function updateNomorKode($kode, $nobaru)
    {
        if ($this->db->update('pengkodean', array('nomor' => $nobaru), array('kode' => $kode))) {
            return true;
        }
        return false;
    }

    function bhisaJS()
    {
        $modules    = $this->uri->segment(1);
        $controller = $this->uri->segment(2);
        $file   = '/var/www/html/hr/application/modules/'.$modules.'/assets/'.$controller.'.js';
        // Check if file exists
        if (file_exists($file)) 
        {
            $content = readfile($file);
            // Output file contents to browser
            die($content);
        }
        else 
        {
            // File not found error message
            die("Error: File not found.");
        }
    }
}
