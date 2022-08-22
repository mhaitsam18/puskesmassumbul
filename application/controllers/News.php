<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_m');
		$this->load->library('pagination');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$keySearch = $this->input->get('cari');


		$data['recentnews']	= $this->News_m->findRecentNews();

		$news = $this->News_m->getNewsPublish();
		$data['content'] = 'news_v';

		$config['total_rows']  = count($news);
		$config['per_page']    = 3;
		$config['base_url']    = base_url('news/index');
		$config['uri_segment'] = 3;

		$config['full_tag_open']    = '<ul class="pagination">';
		$config['full_tag_close']   = '</ul>';

		$config['num_tag_open']     = '<li class="waves-effect"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="active"><a href="">';

		$config['cur_tag_close']    = '</a></li>';

		$config['next_tag_open']    = '<li class="waves-effect"><span class="page-link">';
		$config['next_tag_close']  	= '</span></li>';

		$config['prev_tag_open']    = '<li class="waves-effect"><span class="page-link">';
		$config['prev_tag_close']  	= '</span></li>';

		$config['first_tag_open']   = '<li class="waves-effect"><span class="page-link">';
		$config['first_tag_close'] 	= '</span><i class="material-icons">chevron_left</i></li>';

		$config['last_tag_open']    = '<li class="waves-effect"><span class="page-link">';
		$config['last_tag_close']  	= '</span><i class="material-icons">chevron_right</i></li>';

		$this->pagination->initialize($config);
		$perPage 					= $config['per_page'];

		$data['katalog'] 		= $this->News_m->getNewsPublish($perPage, $this->uri->segment(3));

		$data['pagination'] 	= $this->pagination->create_links();


		if ($this->input->get('cari')) {

			$data['katalog'] = $this->News_m->getNewsPublish($perPage, $this->uri->segment(4), $this->input->get('cari'));

			if (empty($data['katalog'])) {

				$this->session->set_flashdata('error', ' Maaf, Artikel yang Anda cari tidak ada !');
				redirect('news');
			}
		} else {

			$data['katalog'] 	= $this->News_m->getNewsPublish($perPage, $this->uri->segment(3));
		}

		$this->load->view('template_v', $data);
	}


	function cari($page = 0)

	{
		if (!empty($this->input->get('cari'))) {
			$keySearch = $this->input->get('cari');
		} else {
			$keySearch = $this->uri->segment(3);
		}

		$news = $this->News_m->getNewsCariPublish();
		$data['recentnews']	= $this->News_m->findRecentNews();

		$data['content'] 	   = "news_v";


		$config['total_rows']  = count($news);
		$config['per_page']    = 5;
		$config['base_url']    = base_url('news/cari/' . $keySearch);
		$config['uri_segment'] = 4;

		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  	= '<span aria-hidden="true"></span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  	= '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] 	= '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  	= '</span></li>';


		$this->pagination->initialize($config);

		$perPage 			= $config['per_page'];


		$data['katalog'] 	= $this->News_m->getNewsCariPublish($perPage, $this->uri->segment(4));

		$data['pagination'] 	= $this->pagination->create_links();

		if ($this->input->get('cari')) {

			$data['katalog'] = $this->News_m->getNewsCariPublish($perPage, $this->uri->segment(4), $this->input->get('cari'));

			if (empty($data['katalog'])) {

				$this->session->set_flashdata('error', ' Maaf, Artikel yang Anda cari tidak ditemukan !');
				redirect('news');
			}
		} else {

			$data['katalog'] 	= $this->News_m->getNewsCariPublish($perPage, $this->uri->segment(4));
		}

		$this->load->view('template_v', $data);
	}

	function detail($permalink)
	{

		$data['recentnews']	= $this->News_m->findRecentNews();
		$data['news'] 		= $this->News_m->geNewsByPermalink($permalink)->row_array();
		$data['content'] 	= "news_detail_v";
		$this->load->view('template_v', $data);
	}

	public function kirimWhatsApp($no_wa = '', $pesan = '')
	{
		$no_wa = $this->input->post('no_wa');
		$pesan = $this->input->post('url');

		$no_wa_dibalik = strrev($no_wa);
		$awal_no_wa = substr($no_wa_dibalik, -1);
		if ($awal_no_wa == '0') {
			$no_wa = '+62' . substr($no_wa, 1);
		}
		header("location: http://api.whatsapp.com/send?phone=$no_wa&text=$pesan");
	}
}



/* End of file News.php */
/* Location: ./application/controllers/News.php */