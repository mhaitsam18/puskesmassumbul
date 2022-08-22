<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi_m extends CI_Model {

	private $table_name     = "tb_dokter";
    private $primary_key    = "d_id";

	function getAll($keyword = null) {

        $this->db->select('a.*, b.poli_nama');
        $this->db->join('tb_poli b', 'a.d_poli = b.poli_kode', 'left');

        if(!empty($keyword)){
        	$this->db->like('a.d_fullname', $keyword);
        	$this->db->or_like('b.poli_nama', $keyword);
        }

        $this->db->order_by('b.poli_nama', 'asc');
        $this->db->order_by('a.d_fullname', 'asc');
        $query = $this->db->get('tb_dokter a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function get_dokter_by_id($permalink) {
    	$this->db->select('a.*, b.poli_nama');
        $this->db->join('tb_poli b', 'a.d_poli = b.poli_kode', 'left');
        $this->db->where('a.permalink', $permalink);
        $this->db->order_by('a.d_id', 'desc');

        return $this->db->get($this->table_name.' a', 1);
        
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

	function get_chat($mid,$did) {
        $this->db->where('c_mid', $mid);
        $this->db->where('c_did', $did);
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get('tb_konsultasi');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function get_list_chat($mid) {
        $this->db->select('a.c_did, b.d_fullname AS nmdokter, b.permalink, b.d_image, c.poli_nama');
        $this->db->join('tb_dokter b', 'a.c_did = b.d_id', 'left');
        $this->db->join('tb_poli c', 'b.d_poli = c.poli_kode', 'left');
        $this->db->where('a.c_mid', $mid);
        $this->db->group_by('a.c_did');
        $this->db->order_by('b.d_fullname', 'asc');
        $query = $this->db->get('tb_konsultasi a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function save($person) {
		$this->db->insert('tb_konsultasi', $person);
		return $this->db->insert_id();
	}

    function delete($id) {
        $this->db->where('c_id', $id);
        $this->db->delete('tb_konsultasi');
    }
}

/* End of file Konsultasi_m.php */
/* Location: ./application/models/Konsultasi_m.php */