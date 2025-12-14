<?php
class Pengumuman extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}

	function index()
	{
		$this->data['data'] = $this->m_pengumuman->get_all_pengumuman();
		$this->data['breadcrumb']  = 'Data Pengumuman Gereja';
		$this->data['main_view']   = 'admin/v_pengumuman';
		$this->load->view('theme/admintemplate', $this->data);
	}

	function simpan_pengumuman()
	{
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$tanggal = $this->input->post('xtanggal');

		// Konfigurasi upload gambar
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048; // 2MB
		$config['file_name'] = 'pengumuman_' . time();

		$this->upload->initialize($config);

		// Inisialisasi variabel $gambar
		$gambar = '';

		if (!empty($_FILES['gambar']['name'])) { // Cek jika ada file yang diupload
			if (!$this->upload->do_upload('gambar')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error['error']);
				redirect('admin/pengumuman');
			} else {
				$data = array('upload_data' => $this->upload->data());
				$gambar = $data['upload_data']['file_name']; // Ambil nama file gambar
			}
		}

		// Simpan pengumuman, baik dengan gambar atau tanpa gambar
		$this->m_pengumuman->simpan_pengumuman($judul, $deskripsi, $tanggal, $gambar);
		$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		redirect('admin/pengumuman');
	}


	function update_pengumuman()
	{
		$kode = strip_tags($this->input->post('kode'));
		$judul = strip_tags($this->input->post('xjudul'));
		$deskripsi = $this->input->post('xdeskripsi');
		$tanggal = $this->input->post('xtanggal');

		// Konfigurasi upload gambar
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048; // 2MB
		$config['file_name'] = 'pengumuman_' . time();

		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			$data = array('upload_data' => $this->upload->data());
			$gambar = $data['upload_data']['file_name'];

			// Hapus gambar lama jika ada
			$pengumuman = $this->m_pengumuman->get_pengumuman_by_id($kode);
			if ($pengumuman->pengumuman_gambar != '') {
				unlink('./assets/images/' . $pengumuman->pengumuman_gambar);
			}

			$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $tanggal, $gambar);
		} else {
			$this->m_pengumuman->update_pengumuman($kode, $judul, $deskripsi, $tanggal);
		}

		$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
		redirect('admin/pengumuman');
	}

	function hapus_pengumuman()
	{
		$kode = strip_tags($this->input->post('kode'));
		$pengumuman = $this->m_pengumuman->get_pengumuman_by_id($kode);
		if ($pengumuman->pengumuman_gambar != '') {
			unlink('./assets/images/' . $pengumuman->pengumuman_gambar);
		}
		$this->m_pengumuman->hapus_pengumuman($kode);
		$this->session->set_flashdata('hapus', 'Data berhasil dihapus.');
		redirect('admin/pengumuman');
	}
}
