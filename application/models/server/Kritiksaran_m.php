<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritiksaran_m extends CI_Model {

	private $table_name 	= "tb_kritik_saran";
	private $primary_key 	= "c_id";

	function findAll() {

		$this->db->order_by($this->primary_key, 'desc');
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function get_by_id($id) {

		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
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

/* End of file Kritiksaran_m.php */
/* Location: ./application/models/server/Kritiksaran_m.php */