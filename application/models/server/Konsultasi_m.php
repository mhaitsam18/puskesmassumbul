<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi_m extends CI_Model {

	private $table_name 	= "tb_konsultasi";
	private $primary_key 	= "c_id";

	function findAll() {
		$this->db->select('a.c_id, a.c_mid, b.r_fullname, a.c_did, c.d_fullname, a.c_value, a.created_by, a.created_on');
        $this->db->join('tb_member b', 'a.c_mid = b.r_id', 'left');
        $this->db->join('tb_dokter c', 'a.c_did = c.d_id', 'left');
        $this->db->order_by('a.c_id', 'asc');
        $query = $this->db->get('tb_konsultasi a');
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

/* End of file Konsultasi_m.php */
/* Location: ./application/models/server/Konsultasi_m.php */