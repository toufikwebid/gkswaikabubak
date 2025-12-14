<?php
class History extends CI_Controller

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
		$this->data['title2'] = 'History';
		$this->data['main_view']   = 'depan/v_history';
		$this->load->view('theme/template', $this->data);
	}
   
}
