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
class Front_Controller extends Base_Controller
{

	//--------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('assets');

		$this->set_current_user();

		Template::set_theme('docy');
	} //end __construct()

	public function dropdown_opt_generate($opt_name = "", $opt_key = "", $opt_caption = "", $opt_table = "", $opt_add = "", $opt_condition = "", $opt_select2 = FALSE, $opt_all = FALSE, $opt_order = "") //tambah
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
		} else {
			foreach ($query as $row) {
				$list[$row[$opt_key]] = addslashes($row[$opt_caption]);
			}
		}

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

	function update_settings()
	{
		$this->db->where('id', 1);
		$this->db->set('code', 'code+1', FALSE);
		if ($this->db->update('y_settings')) {
			return true;
		}
		return false;
	}

	public function report_datatables_filter($view)
	{
		Assets::add_css(
			array('datatables/1.9.2/css/dataTables.bootstrap.css')
		);

		Assets::add_js(array(
			'datatables/1.9.2/js/jquery.dataTables.min.js',
			'datatables/1.9.2/js/TableTools.min.js',
			'datatables/1.9.2/js/dataTables.bootstrap.js',
			'datatables/1.9.2/js/FixedHeader.min.js'
		));

		Template::set_block('report_table', 'report/' . $view . '/table');
		Template::set_block('report_filter', 'report/' . $view . '/filter');
		Template::set_view('report/view_main');
		Template::render();
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
}

/* End of file Front_Controller.php */
/* Location: ./application/core/Front_Controller.php */