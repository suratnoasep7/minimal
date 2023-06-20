<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
	Copyright (c) 2011 Lonnie Ezell

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

class Navigation extends Base_Controller
{

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		if (!class_exists('CI_Session')) {
			$this->load->library('session');
		}
	}

	public function menu_module($apps = "ERP")
	{
		$this->db->select('menu_module.*');
		$this->db->from('permissions');
		$this->db->join('role_permissions', 'role_permissions.permission_id = permissions.permission_id');
		$this->db->join('menu_module', 'menu_module.module_id = permissions.module_id');
		$this->db->where('role_id = ' . $this->session->userdata('role_id'));
		$this->db->where('menu_module.apps', $apps);
		$this->db->group_by('menu_module.module_id');
		$this->db->order_by('menu_module.caption', "ASC");
		return $this->db->get()->result();
	}

	public function menu_kategori($apps = "ERP")
	{
		$current_module = $this->uri->segment(1);
		if ($current_module <> "") {
			$this->db->select('menu_type.*');
			$this->db->select('permissions.name as namelow');
			$this->db->from('permissions');
			$this->db->join('role_permissions', 'role_permissions.permission_id = permissions.permission_id');
			$this->db->join('menu_type', 'menu_type.type_id = permissions.type_id');
			$this->db->join('menu_module', 'menu_module.module_id = permissions.module_id');
			$this->db->where('permissions.type_id <> 0');
			$this->db->where('menu_module.apps', $apps);
			$this->db->where('role_id = ' . $this->session->userdata('role_id'));
			$this->db->where('permissions.name LIKE "' . $current_module . '%"');
			$this->db->group_by('permissions.type_id');
			$this->db->order_by('menu_type.caption');
			$kat_role = $this->db->get()->result();

			$this->db->select('*');
			$this->db->from('permissions');
			$this->db->join('role_permissions', 'role_permissions.permission_id = permissions.permission_id');
			$this->db->where('role_id = ' . $this->session->userdata('role_id'));
			$this->db->where('name LIKE "' . $current_module . '%"');
			$this->db->order_by('permissions.description');
			$permission_role = $this->db->get()->result();

			foreach ($kat_role as $kat) {
				foreach ($permission_role as $permission) {
					if ($kat->type_id == $permission->type_id) {
						$namelow 	= strtolower($permission->name);
						$jExplode 	= explode(".", $namelow);
						if (count($jExplode) > 2) {
							$submenu[] = (object) array(
								'uri'     => site_url() . str_replace('.', '/', $namelow),
								'name'	  => $jExplode[2],
								'caption' => $permission->description,
								'color'   => $permission->color,
								'icon'    => $permission->icon
							);
						}
					}
				}

				$data[] = (object)  array(
					'uri'     => site_url() . str_replace('.', '/', $kat->namelow),
					'name' 	  => $kat->name,
					'caption' => $kat->caption,
					'icon' => $kat->icon,
					'submenu' => $submenu
				);

				unset($submenu);
			}

			return $data;
		}
	}
}

// End sidebar class