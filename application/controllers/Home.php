<?php
class Home extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_situs');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();

		$this->load->helper('text'); // Memuat helper text
	}

	public function index()
	{
		$this->load->model('m_agenda');
		$nearest_agenda = $this->m_agenda->get_nearest_agenda();
		$last_agenda = $this->m_agenda->get_last_agenda();

		if ($nearest_agenda) {
			$this->data['agenda_nama'] = $nearest_agenda->agenda_nama;
			$this->data['agenda_deskripsi'] = $nearest_agenda->agenda_deskripsi;
			$this->data['countdown_date'] = $nearest_agenda->agenda_mulai;
			$this->data['message'] = '';
		} else {
			if ($last_agenda) {
				$this->data['agenda_nama'] = 'Tidak ada jadwal';
				$this->data['agenda_deskripsi'] = '';
				$this->data['countdown_date'] = $last_agenda->agenda_mulai;
				$this->data['message'] = 'Jadwal terakhir sudah lewat dan Belum ada Jadwal baru';
			} else {
				// Jika tidak ada agenda terdekat dan terakhir, atur nilai default
				$this->data['agenda'] = (object) [
					'agenda_nama' => 'Tidak ada jadwal',
					'agenda_deskripsi' => 'Tidak ada jadwal tersedia.'
				];
				$this->data['countdown_date'] = date('Y-m-d H:i:s');
				$this->data['message'] = 'Tidak ada jadwal tersedia.';
			}
		}

		// Debugging: Cetak data agenda untuk memastikan data diterima dengan benar
		// echo '<pre>';
		// print_r($this->data['agenda']);
		// echo '</pre>';
		// exit;

		$this->data['title2'] = 'HOME';
		$this->data['main_view']   = 'depan/v_home';
		$this->data['announcement'] = $this->m_pengumuman->get_next_announcement();
		$this->data['situs'] = $this->m_situs->get_all_situs();
		$this->data['berita'] = $this->m_tulisan->get_berita_home();
		$this->data['pengumuman'] = $this->m_pengumuman->get_all_pengumuman();
		$this->data['agenda'] = $this->m_agenda->get_agenda_home();
		$this->data['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$this->data['tot_siswa'] = $this->db->get('tbl_jemaat')->num_rows();
		$this->data['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$this->data['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();

		$this->load->view('theme/template', $this->data);
	}
}
