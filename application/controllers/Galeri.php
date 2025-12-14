<?php
class Galeri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_galeri');
		$this->load->model('m_album');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		$this->data['title2'] = 'GALERI';
		$this->data['main_view']   = 'depan/v_galeri';

		$this->data['all_album'] = $this->m_galeri->get_all_album();
		$this->data['all_galeri'] = $this->m_galeri->get_all_galerialbum();

		$this->load->view('theme/template', $this->data);
	}
	function album()
	{
		$idalbum = $this->uri->segment(3);
		$x['alb'] = $this->m_album->get_all_album();
		$x['data'] = $this->m_galeri->get_galeri_by_album_id($idalbum);
		$this->load->view('depan/v_galeri_per_album', $x);
	}
	public function filter_by_album($id_album)
	{
		$data['all_galeri'] = $this->m_galeri->get_galeri_by_album($id_album);
		$data['all_album'] = $this->m_album->get_all_album();
		$this->load->view('galeri_view', $data);
	}

	public function search_by_name()
	{
		$galeri_nama = $this->input->get('galeri_nama');
		$data['all_galeri'] = $this->m_galeri->get_galeri_by_name($galeri_nama);
		$data['all_album'] = $this->m_album->get_all_album();
		$this->load->view('galeri_view', $data);
	}
}
