<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_m');
        $maintenance = $this->db->get('tb_maintenance')->row();
        if ($maintenance->status == 0) {
            redirect('maintenance/index');
        }
    }

    public function index()
    {
        $data['content'] = 'register_v';
        $this->load->view('template_v', $data);
    }

    public function save()
    {

        $cek = $this->Register_m->cek_dup($this->input->post('u_email'))->row_array();

        if (empty($cek['r_mail'])) {
            $fdata['r_mail'] = $this->input->post('u_email');
            $fdata['r_fullname'] = $this->input->post('u_name');
            $fdata['r_pass'] = md5($this->input->post('u_pass'));
            $fdata['created_by'] = $this->input->post('u_name');
            $fdata['created_on'] = date('Y-m-d h:i:s');

            $insert = $this->Register_m->save($fdata);

            $this->session->set_flashdata('success', 'Terima kasih telah menjadi bagian dari kami.<br>Silahkan cek email anda untuk proses verifikasi.');

            redirect(base_url() . 'register/success', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Email anda sudah terdaftar!');
            echo "<script>history.go(-1)</script>";
        }
    }

    public function success()
    {
        $data['content'] = 'register_success_v';
        $this->load->view('template_v', $data);
    }
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */