<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_m extends CI_Model {

	private $table_name 	= "tb_poli";
	private $primary_key 	= "poli_kode";

	function findAll() {

		$this->db->order_by('poli_nama', 'asc');
		$query = $this->db->get($this->table_name);

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

	function get_jadwal($id) {
        $this->db->select('a.poli_kode, b.p_hari, b.p_jam, b.p_desc');
        $this->db->join('tb_poli_jadwal b', 'a.poli_kode = b.p_id', 'left');
		$this->db->where('a.poli_kode', $id);
        $this->db->order_by('a.poli_kode', 'asc');
        $this->db->order_by('b.p_hari', 'asc');
        $query = $this->db->get($this->table_name.' a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function insert_multiple($data){
		$this->db->insert_batch('tb_poli_jadwal', $data);
	}

	function del_jadwal($id) {
		$this->db->where('p_id', $id);
		$this->db->delete('tb_poli_jadwal');
	}

}

/* End of file Poli_m.php */
/* Location: ./application/models/server/Poli_m.php */