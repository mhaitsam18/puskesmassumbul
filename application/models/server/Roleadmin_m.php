<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleadmin_m extends CI_Model {

	private $table_name 	= "tb_role";
	private $primary_key 	= "role_id";

	function findAll() {

		$this->db->order_by('role_name', 'asc');
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() > 0) {
			
			return $query->result_array();
		}
	}

	function get_menu($parent = 0, $id = null) {
		$this->db->select('a.menu_id, a.menu_name, a.menu_icon, a.parent_id, a.ordering, a.linkto, a.enabled, b.menu_view, b.menu_add, b.menu_edit, b.menu_del');
		$this->db->join('(SELECT * FROM tb_role_detail WHERE role_id = \''.$id.'\') AS b', 'a.menu_id = b.menu_id', 'left');
		$this->db->where('a.enabled', 'Y');
		$this->db->where('a.parent_id', $parent);
		$this->db->order_by('a.ordering', 'asc');
		$query = $this->db->get('tb_menu a');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	public function insert_detilrole($data){
		$this->db->insert_batch('tb_role_detail', $data);
	}

	function delete_detilrole($id) {

		$this->db->where($this->primary_key, $id);
		$this->db->delete('tb_role_detail');
	}


	function get_by_id($id) {

		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
	}

	function save($person) {

		$this->db->insert($this->table_name, $person);
		return $this->db->insert_id();
	}

	function update($id, $person) {

		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $person);
	}

	function delete($id) {

		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	}

}

/* End of file Roleadmin.php */
/* Location: ./application/models/server/Roleadmin_m.php */