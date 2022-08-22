<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {


        parent::__construct();
        $this->load->model('server/Login_m');
        $this->load->database();
        $this->load->library(array('form_validation', 'pagination', 'image_lib', 'session', 'general'));
        $this->load->helper(array('url', 'form', 'text_helper', 'date'));
    }

    public function index()

    {


        if ($this->session->userdata('logged_in') == true) {

            redirect('server/home', 'refresh');
        }

        $vals = array(
            'img_path'   => './assets/captcha/',
            'img_url'    => base_url() . 'assets/captcha/',
            'img_width'  => '200',
            'img_height' => 30,
            'border' => 0,
            'expiration' => 7200,
            'word_length'   => 4,
            'font_size' => 32,
            'font_path' => FCPATH . 'captcha/font/Aller_Bd.ttf',
            'pool'          => '0123456789',
        );

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
        $this->load->view('server/login_v', $data);
    }

    function refresh_captcha()
    {
        $vals = array(
            'img_path'   => './assets/captcha/',
            'img_url'    => base_url() . 'assets/captcha/',
            'img_width'  => '200',
            'img_height' => 30,
            'border' => 0,
            'expiration' => 7200,
            'word_length'   => 4,
            'font_size' => 32,
            'font_path' => FCPATH . 'captcha/font/Aller_Bd.ttf',
            'pool'          => '0123456789',
        );

        $cap = create_captcha($vals);

        $this->session->unset_userdata('mycaptcha');
        $this->session->set_userdata('mycaptcha', $cap['word']);

        echo $cap['image'];
    }

    function in()
    {
        $captcha  = htmlentities($this->input->post('captcha'));
        if ($captcha != $this->session->userdata('mycaptcha')) {
            $this->session->set_flashdata('error', 'Kode Keamanan tidak sesuai! ');
            redirect('server/login');
        } else {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_error_delimiters('', '<br/>');

            if ($this->form_validation->run() == TRUE) {

                $username = htmlentities($this->input->post('username'));
                $password = htmlentities($this->input->post('password'));

                $user = $this->Login_m->checkLogin($username, $password);
                if (!empty($user)) {
                    echo "oke";

                    if ($user['active'] == 'Aktif') {
                        $sessionData['id_login']     = $user['id_login'];
                        $sessionData['nama_lengkap'] = $user['nama_lengkap'];
                        $sessionData['email']        = $user['email'];
                        $sessionData['no_hp']        = $user['no_hp'];
                        $sessionData['username']     = $user['username'];
                        $sessionData['active']       = $user['active'];
                        $sessionData['role']         = $user['role'];

                        $sessionData['ip_login']     = $this->input->ip_address();
                        $sessionData['is_login']     = TRUE;

                        $this->session->set_userdata($sessionData);
                        $this->session->set_userdata('file_manager', true);
                        redirect('server/home');
                    } else {
                        $this->session->set_flashdata('error', 'User anda tidak aktif.');
                        redirect('server/login');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Username Tidak terdaftar.');
                    redirect('server/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password tidak cocok.');
                redirect('server/login');
            }
        }
    }



    function close()
    {

        $this->session->unset_userdata(array('logged_in' => '', 'username' => ''));
        $this->session->sess_destroy();
        redirect('server/login');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/server/Login.php */