<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{

    private $table_name     = "tb_member";
    private $primary_key    = "r_mail";

    function checkLogin($email, $password)
    {
        $this->db->where('r_mail', $email);
        $this->db->where('r_pass', md5($password));

        $query = $this->db->get($this->table_name);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function checkLoginDokter($email, $password)
    {
        $this->db->where('d_mail', $email);
        $this->db->where('d_pass', md5($password));

        $query = $this->db->get('tb_dokter');
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function updateLastLogin($tbl, $idkey, $id_users)
    {
        $data = array(
            'r_last_login' => date('Y-m-d H:i:s'),
            'is_online' => 1
        );
        $this->db->where($idkey, $id_users);
        $this->db->update($tbl, $data);
    }

    function updatelogout($tbl, $idkey, $id_users)
    {
        $data = array(
            'r_last_login' => date('Y-m-d H:i:s'),
            'is_online' => 1
        );
        $this->db->where($idkey, $id_users);
        $this->db->update($tbl, $data);
    }

    function cek_email($jns, $id)
    {
        if ($jns == 'D') {
            $tbl = 'tb_dokter';
            $prm = 'd_mail';
        } else {
            $tbl = 'tb_member';
            $prm = 'r_mail';
        }
        $this->db->where($prm, $id);
        return $this->db->get($tbl);
    }
}

/* End of file Login_m.php */
/* Location: ./application/models/server/Login_m.php */