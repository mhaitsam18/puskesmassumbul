<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useradmin_m extends CI_Model {

	private $table_name 	= "tb_login";
	private $primary_key 	= "id_login";

	function findAll() {

		$this->db->select('a.*, b.role_name');
		$this->db->join('tb_role b', 'a.role = b.role_id');
		$this->db->order_by('a.nama_lengkap', 'asc');
		$query = $this->db->get($this->table_name.' a');

		if ($query->num_rows() > 0) {
			
			return $query->result_array();
		}
	}

	function findRole() {

		$this->db->order_by('role_name', 'asc');
		$query = $this->db->get('tb_role');

		if ($query->num_rows() > 0) {
			
			return $query->result_array();
		}
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

/* End of file Useradmin_m.php */
/* Location: ./application/models/server/Useradmin_m.php */