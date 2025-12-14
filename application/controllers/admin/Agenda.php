<?php
class Agenda extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
			if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_agenda');
		$this->load->model('m_jemaat');
		$this->load->library('upload');
	}


	function index()
	{
		$this->data['data'] = $this->m_agenda->get_all_agenda();
		$this->data['jemaat'] = $this->m_jemaat->get_all_jemaat_lama();

		$this->data['breadcrumb']  = 'Data Kebaktian Gereja';

		$this->data['main_view']   = 'admin/v_agenda';

		$this->load->view('theme/admintemplate', $this->data);
	}

	function simpan_agenda()
	{
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$waktu = $this->input->post('xwaktu');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->simpan_agenda($nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
		$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
		redirect('admin/agenda');
	}

	function update_agenda()
	{
		$kode = strip_tags($this->input->post('kode'));
		$nama_agenda = strip_tags($this->input->post('xnama_agenda'));
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$selesai = $this->input->post('xselesai');
		$tempat = $this->input->post('xtempat');
		$waktu = $this->input->post('xwaktu');
		$keterangan = $this->input->post('xketerangan');
		$this->m_agenda->update_agenda($kode, $nama_agenda, $deskripsi, $mulai, $selesai, $tempat, $waktu, $keterangan);
		$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
		redirect('admin/agenda');
	}
	function hapus_agenda()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_agenda->hapus_agenda($kode);
		$this->session->set_flashdata('hapus', 'Data berhasil dihapus.');
		redirect('admin/agenda');
	}

	function broadcast_agenda()
	{
		$nama_agenda = strip_tags($this->input->post('xnama'));
		$deskripsi = $this->input->post('xdeskripsi');
		$mulai = $this->input->post('xmulai');
		$tempat = $this->input->post('xtempat');
		$waktu = $this->input->post('xwaktu');
		$hp = strip_tags($this->input->post('xhp'));
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.fonnte.com/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'target' => $hp,
				'message' => '
Broadcast Message Jemaat untuk Acara ' . $nama_agenda .
					'
dengan rincian ' . $deskripsi .
					'
yang akan dilakukan tanggal ' . date("j F Y", strtotime($mulai)) .
					'
jam  ' . $waktu .
					'
di ' . $tempat,
				'countryCode' => '62', //optional
			),
			CURLOPT_HTTPHEADER => array(
				'Authorization: KfABkZesxeB2secuckiw' //change TOKEN to your actual token
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
		$this->session->set_flashdata('broadcast', 'Data berhasil di Broadcast ke Jemaat.');
		redirect('admin/agenda');
	}
}
