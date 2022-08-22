<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_m extends CI_Model {

    private $table_name     = "tb_poli";
    private $primary_key    = "poli_kode";


    function getAll() {
        $this->db->order_by('poli_nama', 'asc');
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getJadwal() {
        $this->db->select('a.poli_kode as p_id, b.p_hari, b.p_jam, b.p_desc');
        $this->db->join('tb_poli_jadwal b', 'a.poli_kode = b.p_id', 'left');
        $this->db->order_by('a.poli_kode', 'asc');
        $this->db->order_by('b.p_hari', 'asc');
        $query = $this->db->get($this->table_name.' a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
}

/* End of file Poli_m.php */
/* Location: ./application/models/server/Poli_m.php */