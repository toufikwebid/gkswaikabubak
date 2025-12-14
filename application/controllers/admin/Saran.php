<?php
class Saran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
			if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('SaranModel');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{
		$this->data['saran'] = $this->SaranModel->get_all();

		$this->data['breadcrumb']  = 'Data Saran';

		$this->data['main_view']   = 'admin/v_saran';

		$this->load->view('theme/admintemplate', $this->data);
	}

	
	function hapus_saran($id)
	{
		if ($this->SaranModel->delete($id)) {
            $this->session->set_flashdata('success', 'Saran berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus saran.');
        }
		redirect('admin/saran');
	}
}
