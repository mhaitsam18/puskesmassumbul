<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        // $maintenance = $this->db->get('tb_maintenance')->row();
        // if ($maintenance->status == 0) {
        //     redirect('maintenance/index');
        // }
    }

    public function index()
    {
        if ($this->session->userdata('is_login_member') == true) {
            redirect(base_url() . 'myprofile');
        } else {
            $data['content'] = 'login_v';
            $this->load->view('template_v', $data);
        }
    }

    public function recovery()
    {
        $data['content'] = 'recovery_v';
        $this->load->view('template_v', $data);
    }

    public function in()
    {
        $u_jenis = $this->input->post('u_jenis');

        if ($u_jenis == 'D') {
            //dokter start
            if ($this->session->userdata('is_login_member') == true) {
                redirect(base_url() . 'myprofile');
            } else {
                $user = $this->Login_m->checkLoginDokter($this->input->post('u_email'), $this->input->post('u_pass'));
                if (!empty($user)) {
                    if ($user['d_status'] == 'ACTIVE') {
                        $sessionData['idlogin'] = $user['d_id'];
                        $sessionData['fullname'] = $user['d_fullname'];
                        $sessionData['email'] = $user['d_mail'];
                        $sessionData['image'] = 'dokter/' . $user['d_image'];
                        $sessionData['bday'] = $user['d_bday'];
                        $sessionData['gender'] = $user['d_gender'];
                        $sessionData['jenis'] = $u_jenis;
                        $sessionData['linkto'] = 'dokter';

                        $sessionData['ip_login'] = $this->input->ip_address();
                        $sessionData['is_login_member'] = true;
                        $sessionData['is_dokter'] = true;

                        $this->session->set_userdata($sessionData);
                        $this->session->set_userdata('file_manager', true);

                        $this->Login_m->updateLastLogin('tb_dokter', 'd_id', $user['d_id']);

                        redirect(base_url() . 'myprofiledokter');
                    } else {
                        $this->session->set_flashdata('error', 'Akun anda belum aktif, silahkan hubungi Tim kami.');
                        redirect(base_url() . 'login', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Username dan Password tidak cocok!');
                    redirect(base_url() . 'login', 'refresh');
                }
            }
            //dokter end
        } else {
            //member start
            if ($this->session->userdata('is_login_member') == true) {
                redirect(base_url() . 'myprofile');
            } else {
                $user = $this->Login_m->checkLogin($this->input->post('u_email'), $this->input->post('u_pass'));
                if (!empty($user)) {
                    /*
                    if($user['r_validate'] == 'Y'){
                     */
                    if ($user['r_status'] == 'ACTIVE') {

                        $sessionData['idlogin'] = $user['r_id'];
                        $sessionData['fullname'] = $user['r_fullname'];
                        $sessionData['email'] = $user['r_mail'];
                        $sessionData['image'] = 'member/' . $user['r_image'];
                        $sessionData['bday'] = $user['r_bday'];
                        $sessionData['gender'] = $user['r_gender'];
                        $sessionData['jenis'] = $u_jenis;
                        $sessionData['linkto'] = '';

                        $sessionData['ip_login'] = $this->input->ip_address();
                        $sessionData['is_login_member'] = true;
                        $sessionData['is_pasien'] = true;

                        $this->session->set_userdata($sessionData);
                        $this->session->set_userdata('file_manager', true);

                        $this->Login_m->updateLastLogin('tb_member', 'r_id', $user['r_id']);

                        redirect(base_url() . 'myprofile');
                    } else {
                        $this->session->set_flashdata('error', 'Akun anda belum aktif, silahkan hubungi Tim kami.');
                        redirect(base_url() . 'login', 'refresh');
                    }
                    /*
                }else{
                $this->session->set_flashdata('error', 'Email anda belum di validasi, silahkan login ke email anda untuk validasi.');
                redirect(base_url().'login','refresh');
                }
                 */
                } else {
                    $this->session->set_flashdata('error', 'Username dan Password tidak cocok!');
                    redirect(base_url() . 'login', 'refresh');
                }
            }
            //member end
        }
    }

    public function actrecovery()
    {
        if ($this->session->userdata('is_login_member') == true) {
            redirect(base_url() . 'myprofile');
        } else {
            $cek = $this->Login_m->cek_email($this->input->post('u_jenis'), $this->input->post('u_email'))->row_array();

            if (!empty($cek)) {
                //kirim email recovery password ke member

                $this->session->set_flashdata('message', 'Kami telah mengirimkan pesan ke email anda untuk proses selanjutnya.');
                redirect(base_url() . 'login/recovery', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'Email anda belum terdaftar!');
                redirect(base_url() . 'login/recovery', 'refresh');
            }

            $data['content'] = 'recovery_v';
            $this->load->view('template_v', $data);
        }
    }

    public function close()
    {

        $this->session->unset_userdata(array('fullname' => '', 'email' => '', 'image' => '', 'bday' => '', 'gender' => '', 'ip_login' => '', 'idlogin' => ''));
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */