<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasidokter_m extends CI_Model {

	private $table_name     = "tb_dokter";
    private $primary_key    = "d_id";

	function get_chat($did,$mid) {
        $this->db->where('c_mid', $mid);
        $this->db->where('c_did', $did);
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get('tb_konsultasi');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function get_member_by_id($id) {
        $this->db->where('r_id', $id);
        return $this->db->get('tb_member');
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function get_list_chat($did) {
        $this->db->select('a.c_mid, b.r_fullname AS nmmember, b.r_image, b.r_mail, b.r_bday');
        $this->db->join('tb_member b', 'a.c_mid = b.r_id', 'left');
        $this->db->where('a.c_did', $did);
        $this->db->group_by('a.c_mid');
        $this->db->order_by('b.r_fullname', 'asc');
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

/* End of file Konsultasidokter_m.php */
/* Location: ./application/models/Konsultasidokter_m.php */