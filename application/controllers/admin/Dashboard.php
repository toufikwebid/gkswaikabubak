<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();;
		if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pengunjung');
		$this->load->model('m_jemaat');
		$this->load->model('m_agenda');
	}


	public function index()
	{
		// Mengambil total jemaat

		$this->data['total_jemaat'] = $this->m_jemaat->get_total_jemaat();

		// Mengambil total jenis kelamin
		$this->data['jenis_kelamin'] = $this->m_jemaat->get_jenis_kelamin();

		// Mengambil total acara yang akan datang

		$this->data['total_acara'] = $this->m_agenda->get_total_acara_mendatang();

		$this->data['statistik_pengunjung'] = $this->m_pengunjung->get_visitor_data();

		// Mengambil statistik umur
		$this->data['statistik_umur'] = $this->m_jemaat->get_statistik_umur();

		// Mengambil statistik pendidikan
		$this->data['statistik_pendidikan'] = $this->m_jemaat->get_statistik_pendidikan();

		// Mengambil statistik pekerjaan
		$this->data['statistik_pekerjaan'] = $this->m_jemaat->get_statistik_pekerjaan();



		$this->data['breadcrumb']  = 'Dashboard';

		$this->data['main_view']   = 'admin/v_dashboard';

		$this->load->view('theme/admintemplate', $this->data);
	}
}
