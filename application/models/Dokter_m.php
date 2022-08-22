<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_m extends CI_Model
{

    private $table_name = "tb_dokter";
    private $primary_key = "d_id";

    public function getAll()
    {
        $this->db->select('a.*, b.poli_nama');
        $this->db->join('tb_poli b', 'a.d_poli = b.poli_kode', 'left');
        $this->db->order_by('b.poli_nama', 'asc');
        $this->db->order_by('a.d_fullname', 'asc');
        $query = $this->db->get($this->table_name . ' a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function getJadwal()
    {
        $this->db->select('b.id_jadwal, a.d_id, b.d_hari, b.d_jam, b.d_desc');
        $this->db->join('tb_jadwal_dokter b', 'a.d_id = b.d_id', 'left');
        $this->db->order_by('a.d_id', 'asc');
        $this->db->order_by('b.d_hari', 'asc');
        $query = $this->db->get($this->table_name . ' a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    function get_jadwal($id)
    {
        $this->db->select('a.d_id, b.d_hari, b.d_jam, b.d_desc');
        $this->db->join('tb_jadwal_dokter b', 'a.d_id = b.d_id', 'left');
        $this->db->where('a.d_id', $id);
        $this->db->order_by('a.d_id', 'asc');
        $this->db->order_by('b.d_hari', 'asc');
        $query = $this->db->get($this->table_name . ' a');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function getLayByPermalink($permalink)
    {
        $this->db->where('permalink', $permalink);
        $this->db->order_by($this->primary_key, 'desc');

        $query = $this->db->get($this->table_name, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    public function get_janji_temu()
    {
        $id_user = $this->session->userdata('idlogin');

        $this->db->select('*');
        $this->db->from('tb_janji_temu a');
        $this->db->join('tb_member b', 'a.id_pasien = b.r_id');
        if ($this->session->userdata('jenis') == 'D') {
            $this->db->where('a.d_id', $id_user);
        } else {
            $this->db->where('a.id_pasien', $id_user);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function get_by_id($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table_name);
    }

    function insert_multiple($data)
    {
        $this->db->insert_batch('tb_jadwal_dokter', $data);
    }

    function del_jadwal($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete('tb_jadwal_dokter');
    }
}

/* End of file Dokter_m.php */
/* Location: ./application/models/server/Dokter_m.php */