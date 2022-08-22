<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofiledokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->general->cekMemberLogin();
        $this->load->model('Myprofiledokter_m');
        $maintenance = $this->db->get('tb_maintenance')->row();
        if ($maintenance->status == 0) {
            redirect('maintenance/index');
        }
    }

    public function index()
    {
        $data['users'] = $this->Myprofiledokter_m->get_by_id()->row_array();
        $data['content'] = 'myprofiledokter_v';
        $this->db->join('tb_member', 'tb_member.r_id = tb_konsultasi.c_mid');
        $this->db->order_by('tb_konsultasi.created_on', 'ASC');
        $data['konsultasi'] = $this->db->get_where('tb_konsultasi', ['c_did' => $this->session->userdata('idlogin')])->result();
        $this->load->view('template_v', $data);
    }

    public function print_rekap()
    {
        $this->db->join('tb_member', 'tb_member.r_id = tb_konsultasi.c_mid');
        $this->db->order_by('tb_konsultasi.created_on', 'ASC');
        $data['konsultasi'] = $this->db->get_where('tb_konsultasi', ['c_did' => $this->session->userdata('idlogin')])->result();

        $this->load->view('p_rekap', $data);
    }

    public function changepwd()
    {
        $data['users'] = $this->Myprofiledokter_m->get_by_id()->row_array();
        $data['content'] = 'change_pwd_v';
        $this->load->view('template_v', $data);
    }

    public function recoverypwd()
    {
        $id = $this->session->userdata('idlogin');
        $users = $this->Myprofiledokter_m->get_by_id()->row_array();
        $data['content'] = 'change_pwd_v';

        $old_pass = md5($this->input->post('old_pass'));
        $new_pass1 = $this->input->post('new_pass1');
        $new_pass2 = $this->input->post('new_pass2');

        if ($users['d_pass'] == $old_pass) {
            if ($new_pass1 == $new_pass2) {
                if (strlen($new_pass1) > 5) {
                    $fdata['d_pass'] = md5($this->input->post('new_pass1'));
                    $edit = $this->Myprofiledokter_m->update($id, $fdata); ?>
                    <script type="text/javascript" language="javascript">
                        alert("Ganti Password berhasil!");
                    </script>
            <?php
                    redirect('myprofiledokter', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Password baru minimal 6 huruf / angka!');
                    redirect('myprofiledokter/changepwd', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error', 'Password baru tidak cocok!');
                redirect('myprofiledokter/changepwd', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Password lama salah!');
            redirect('myprofiledokter/changepwd', 'refresh');
        }

        $this->load->view('template_v', $data);
    }

    public function edit()
    {
        $data['users'] = $this->Myprofiledokter_m->get_by_id()->row_array();
        $data['content'] = 'myprofiledokter_edit_v';
        $this->load->view('template_v', $data);
    }

    public function editsave()
    {
        $id = $this->session->userdata('idlogin');

        $new_name = time() . $_FILES["d_image"]['name'];
        $config['upload_path'] = './image/dokter';
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size'] = '2000';
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if (empty($_FILES['d_image']['name'])) {
            //Mengambil data dari form
            $fdata['d_fullname'] = $this->input->post('d_fullname');
            $fdata['d_mail'] = $this->input->post('d_mail');
            $fdata['d_bday'] = $this->input->post('d_bday');
            $fdata['d_gender'] = $this->input->post('d_gender');
            $fdata['permalink'] = textToSlug($this->input->post('d_fullname'));
            $fdata['modified_on'] = date('Y-m-d h:i:s');
            $fdata['modified_by'] = $this->input->post('d_fullname');

            $edit = $this->Myprofiledokter_m->update($id, $fdata);

            ?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di update");
            </script>
            <?php
            redirect('myprofiledokter/relogin', 'refresh');
        } else {
            if (!$this->upload->do_upload('d_image')) {
                echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB.);</script>";
                echo "<script>javascript:history.go(-1);</script>";
            } else {
                //Mengambil data dari form
                $fdata['d_fullname'] = $this->input->post('d_fullname');
                $fdata['d_mail'] = $this->input->post('d_mail');
                $fdata['d_bday'] = $this->input->post('d_bday');
                $fdata['d_gender'] = $this->input->post('d_gender');
                $fdata['d_image'] = str_replace(" ", "_", $new_name);
                $fdata['permalink'] = textToSlug($this->input->post('d_fullname'));
                $fdata['modified_on'] = date('Y-m-d h:i:s');
                $fdata['modified_by'] = $this->input->post('d_fullname');

                unlink('image/' . $this->session->userdata('image'));

                $edit = $this->Myprofiledokter_m->update($id, $fdata);
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di update");
                </script>
<?php
                redirect('myprofiledokter/relogin', 'refresh');
            }
        }
    }

    public function relogin()
    {
        $user = $this->Myprofiledokter_m->get_by_id()->row_array();

        $sessionData['idlogin'] = $user['d_id'];
        $sessionData['fullname'] = $user['d_fullname'];
        $sessionData['email'] = $user['d_mail'];
        $sessionData['image'] = 'dokter/' . $user['d_image'];
        $sessionData['bday'] = $user['d_bday'];
        $sessionData['gender'] = $user['d_gender'];
        $sessionData['jenis'] = 'D';
        $sessionData['linkto'] = 'dokter';

        $sessionData['ip_login'] = $this->input->ip_address();
        $sessionData['is_login_member'] = true;

        $this->session->set_userdata($sessionData);
        $this->session->set_userdata('file_manager', true);

        redirect('myprofiledokter', 'refresh');
    }
}

function textToSlug($text = '')
{
    $text = trim($text);
    if (empty($text)) {
        return '';
    }

    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
    return $text;
}

/* End of file Myprofiledokter.php */
/* Location: ./application/controllers/Myprofiledokter.php */