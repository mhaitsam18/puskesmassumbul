<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model('Dokter_m');
        $maintenance = $this->db->get('tb_maintenance')->row();
        if ($maintenance->status == 0) {
            redirect('maintenance/index');
        }
    }

    public function index()
    {
        $data['dokter'] = $this->Dokter_m->getAll();
        $jddoc = $this->Dokter_m->getJadwal();

        if ($jddoc) {
            foreach ($jddoc as $r) {
                $d_id = $r['d_id'];
                $d_hari = $r['d_hari'];
                $data['jadwal']["$d_id"]["$d_hari"] = $r['d_jam'] . '@@' . $r['d_desc'];
            }
        }

        $data['content'] = 'dokter_v';
        $this->load->view('template_v', $data);
    }

    public function edit_jadwal()
    {
        $id = $this->session->userdata('idlogin');
        $jddoc = $this->Dokter_m->get_jadwal($id);

        if ($jddoc) {
            foreach ($jddoc as $r) {
                $d_hari = $r['d_hari'];
                $data['jadwal']["$d_hari"] = $r['d_jam'] . '@@' . $r['d_desc'];
            }
        }

        $data['dokter']    = $this->Dokter_m->get_by_id($id)->row_array();
        $data['content']    = "f_j_dokter";

        $this->load->view('template_v', $data, FALSE);
    }
    public function update_jadwal()
    {
        $id = $this->input->post('d_id');

        $d_hari = $this->input->post('d_hari');
        $d_jam    = $this->input->post('d_jam');
        $d_desc = $this->input->post('d_desc');

        $fdata = array();

        if (is_array($d_hari)) {
            foreach ($d_hari as $i => $value) {
                if (isset($d_jam[$i])) {
                    $d_jam[$i] = $d_jam[$i];
                } else {
                    $d_jam[$i] = '';
                }

                if (isset($d_desc[$i])) {
                    $d_desc[$i] = $d_desc[$i];
                } else {
                    $d_desc[$i] = '';
                }


                if ($d_jam[$i] != '' || $d_jam[$i] != '') {
                    array_push($fdata, array(
                        'd_id'            => $id,
                        'd_hari'        => $d_hari[$i],
                        'd_jam'            => $d_jam[$i],
                        'd_desc'        => $d_desc[$i],
                        'modified_on'    => date('Y-m-d h:i:s'),
                        'modified_by'    => $this->session->userdata('username'),
                    ));
                }
            }

            // print_r($fdata);exit();

            $this->Dokter_m->del_jadwal($id);
            $this->Dokter_m->insert_multiple($fdata);
        }

        $data['dokter']    = $this->Dokter_m->get_by_id($id)->row_array();

        redirect('dokter', 'refresh');
    }

    public function detail($permalink)
    {
        $data['dokter'] = $this->Dokter_m->getLayByPermalink($permalink)->row_array();
        $data['content'] = "dokter_detail_v";
        $this->load->view('template_v', $data);
    }

    public function ajukan_temu($d_id)
    {

        $id_user = $this->session->userdata('idlogin');

        // var_dump($id_user);die();

        $data = [
            'id_pasien' => $id_user,
            'd_id' => $d_id,

        ];

        $this->db->insert('tb_janji_temu', $data);

        $message = $this->session->set_flashdata('message', 'Berhasil mengajukan');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function janji_temu()
    {
        $data['janji'] = $this->Dokter_m->get_janji_temu();

        $data['content'] = 'dokter_janji_v';
        $this->load->view('template_v', $data);
    }

    public function kelola_janji($stat, $id_janji)
    {

        $data = [

            'status_pengajuan' => $stat,

        ];

        $where = [
            'id_janji_temu' => $id_janji,
        ];

        $this->db->update('tb_janji_temu', $data, $where);

        $stat_name = "";

        if ($stat == 1) {
            $stat_name = "Diterima";
        } else {
            $stat_name = "Ditolak";
        }

        $this->session->set_flashdata('message', 'Janji temu berhasil ' . $stat_name);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function surat_rujukan()
    {

        // $data['janji'] = $this->Dokter_m->get_janji_temu();

        $pasiens = $this->db->get('tb_member')->result();

        $data['pasiens'] = $pasiens;

        $data['content'] = 'surat_rujukan_v';
        $this->load->view('template_v', $data);
    }

    public function kirim_surat_rujukan()
    {
        $id_user = $this->session->userdata('idlogin');

        $id_pasien = $this->input->post('nama_pasien');
        // $keterangan = $this->input->post('keterangan');

        // $info_operator = $this->db->get_where('t_operator', ['user_id' => $id_user])->row_array();

        $surat = $this->_uploadFile();

        $data = [
            'id_pasien' => $id_pasien,
            // 'keterangan_surat' => $keterangan,
            'd_id' => $id_user,
            'file_surat' => $surat,
        ];

        $this->db->insert('tb_surat_rujukan', $data);

        $this->session->set_flashdata('message', 'Berhasil mengirim surat rujuk ke pasien');
        // $this->session->set_flashdata('message', $flahdata);

        redirect('dokter/surat_rujukan');
    }

    private function _uploadFile()
    {

        // var_dump($this->input->post('file_img_materi'));
        // die();

        $namaFiles = $_FILES['surat_rujuk']['name'];
        $ukuranFile = $_FILES['surat_rujuk']['size'];
        $type = $_FILES['surat_rujuk']['type'];
        $eror = $_FILES['surat_rujuk']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['surat_rujuk']['tmp_name'];

        if ($eror === 4) {
            $this->session->set_flashdata('message', 'Belum pilih file');

            // $this->session->set_flashdata('message', $flahdata);

            redirect('dokter/surat_rujukan');
            return false;
        }

        $ekstensiGambarValid = ['pdf'];

        $ekstensiGambar = explode('.', $namaFiles);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('message', 'Yang kamu pilih bukan PDF');
            // $this->session->set_flashdata('message', $flahdata);

            redirect('dokter/surat_rujukan');
            return false;
        }

        $namaFilesBaru = "berita";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/surat_rujukan/' . $namaFilesBaru);

        return $namaFilesBaru;
    }


    public function resep_obat()
    {

        // $data['janji'] = $this->Dokter_m->get_janji_temu();

        $this->db->join('tb_member', 'tb_member.r_id = tb_resep.id_pasien');
        $data['resep'] = $this->db->get_where('tb_resep', [
            'id_dokter' => $this->session->userdata('idlogin')
        ])->result();

        $data['content'] = 'resep_obat_h';
        $this->load->view('template_v', $data);
    }
    public function detail_resep_obat($id_resep = null)
    {
        $resep = $this->db->get_where('tb_resep', ['id_resep' => $id_resep])->row();
        $data['resep'] = $resep;

        $pasien = $this->db->get_where('tb_member', ['r_id' => $resep->id_pasien])->row();

        $data['pasien'] = $pasien;
        $data['list_resep_obat'] = $this->db->get_where('tb_resep_obat', ['id_resep' => $id_resep])->result();
        $data['content'] = 'dokter/resep-obat/detail';
        $this->load->view('template_v', $data);
    }

    public function buat_resep()
    {

        // $data['janji'] = $this->Dokter_m->get_janji_temu();

        $pasiens = $this->db->get('tb_member')->result();

        $data['pasiens'] = $pasiens;

        $data['content'] = 'resep';
        $this->load->view('template_v', $data);
    }

    public function buat_resep_obat($id_resep = null)
    {

        $resep = $this->db->get_where('tb_resep', ['id_resep' => $id_resep])->row();
        $data['resep'] = $resep;

        $pasien = $this->db->get_where('tb_member', ['r_id' => $resep->id_pasien])->row();

        $data['pasien'] = $pasien;
        $data['list_resep_obat'] = $this->db->get_where('tb_resep_obat', ['id_resep' => $id_resep])->result();
        $data['content'] = 'resep_obat_d_v';
        $this->load->view('template_v', $data);
    }

    public function add_resep()
    {
        $id_dokter = $this->session->userdata('idlogin');

        $id_pasien = $this->input->post('id_pasien');
        $nama_resep = $this->input->post('nama_resep');
        $data = [
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter,
            'nama_resep' => $nama_resep,
        ];

        $this->db->insert('tb_resep', $data);

        $this->session->set_flashdata('message', 'Berhasil Membuat!');
        redirect('dokter/buat_resep_obat/' . $this->db->insert_id());
    }
    public function add_resep_obat()
    {
        $id_user = $this->session->userdata('idlogin');

        $pasien_id = $this->input->post('nama_pasien');
        $bentuk_obat = $this->input->post('bentuk_obat');
        $dosis = $this->input->post('dosis');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $resep_obat = htmlspecialchars($this->input->post('resep_obat'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $gambar = "";
        $upload_gambar = $_FILES['gambar']['name'];
        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['upload_path'] = './assets/img/resep-obat';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
            }
        } else {
            $this->session->set_flashdata('message', 'Gambar Wajib diupload!');
        }
        $data = [
            'resep_obat' => htmlspecialchars($resep_obat),
            'id_pasien' => $pasien_id,
            'd_id' => $id_user,
            'bentuk_obat' => $bentuk_obat,
            'dosis' => $dosis,
            'jumlah' => $jumlah,
            'satuan' => $satuan,
            'gambar' => $gambar,
            'keterangan' => $keterangan,
        ];

        $this->db->insert('tb_resep_obat', $data);

        $this->session->set_flashdata('message', 'Berhasil mengirim resep obat ke pasien!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus_resep_obat_jquery()
    {
        $id_resep_obat = $this->input->post('id_resep_obat');
        $id_resep = $this->input->post('id_resep');
        $this->db->delete('tb_resep_obat', ['id_resep_obat' => $id_resep_obat]);
        $data['list_resep_obat'] = $this->db->get_where('tb_resep_obat', ['id_resep' => $id_resep])->result();
        $this->load->view('resep_obat_list', $data);
    }
    public function add_jquery_resep_obat()
    {
        $id_dokter = $this->session->userdata('idlogin');
        $id_pasien = $this->input->post('id_pasien');
        $id_resep = $this->input->post('id_resep');
        $bentuk_obat = $this->input->post('bentuk_obat');
        $dosis = $this->input->post('dosis');
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $resep_obat = htmlspecialchars($this->input->post('resep_obat'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $insert = [
            'resep_obat' => htmlspecialchars($resep_obat),
            'keterangan' => htmlspecialchars($keterangan),
            'id_pasien' => $id_pasien,
            'id_resep' => $id_resep,
            'd_id' => $id_dokter,
            'bentuk_obat' => $bentuk_obat,
            'dosis' => $dosis,
            'jumlah' => $jumlah,
            'satuan' => $satuan,
        ];

        $this->db->insert('tb_resep_obat', $insert);

        $data['list_resep_obat'] = $this->db->get_where('tb_resep_obat', ['id_resep' => $id_resep])->result();
        $this->load->view('resep_obat_list', $data);
    }

    public function list_teguran()
    {

        $where = [
            'd_id' => $this->session->userdata('idlogin'),
            // 'deleted_at' => null,
        ];

        $data['teguran'] = $this->db->get_where('tb_teguran', $where)->result();

        $data['content'] = 'list_teguran_v';
        $this->load->view('template_v', $data);
    }

    public function balasTeguran()
    {
        $id_teguran = $this->input->post('id_teguran');
        $balasan = $this->input->post('balasan');
        $updated_at = date('Y-m-d H:i:s');

        $this->db->where('id_teguran', $id_teguran);
        $this->db->update('tb_teguran', [
            'balasan' => $balasan,
            'updated_at' => $updated_at,
        ]);

        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Dokter.php */
/* Location: ./application/controllers/Dokter.php */