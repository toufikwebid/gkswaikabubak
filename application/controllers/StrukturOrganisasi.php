<?php
class StrukturOrganisasi extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengunjung');
        $this->load->model('SaranModel');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		// Menambahkan data title
		$this->data['title2'] = 'Struktur Organisasi';
		$this->data['main_view']   = 'depan/v_strukturorganisasi';
		$this->load->view('theme/template', $this->data);
	}
   
}
