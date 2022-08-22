<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    public function get_banner()
    {
        $this->db->where('c_name', 'banner');
        $dbanner = $this->db->get('tb_identitas')->row_array();
        return $dbanner['c_value'];
    }

    public function get_slider()
    {
        $this->db->order_by('slid_id', 'asc');
        $query = $this->db->get('tb_slider');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function get_recentnews()
    {
        $this->db->where('c_flag', 1);
        $this->db->order_by('c_id', 'desc');
        $query = $this->db->get('tb_news', 5);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function get_surat_rujukan()
    {

        $id_user = $this->session->userdata('idlogin');

        $this->db->select('*');
        $this->db->from('tb_surat_rujukan a');
        $this->db->join('tb_dokter b', 'a.d_id = b.d_id');
        $this->db->where('a.id_pasien', $id_user);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_resep_obat()
    {

        $id_user = $this->session->userdata('idlogin');

        $this->db->select('*');
        $this->db->from('tb_resep_obat a');
        $this->db->join('tb_dokter b', 'a.d_id = b.d_id');
        $this->db->where('a.id_pasien', $id_user);

        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Home_m.php */
/* Location: ./application/models/Home_m.php */