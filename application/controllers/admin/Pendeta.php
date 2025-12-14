<?php
class Pendeta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
			if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pendeta');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index()
	{

		$this->data['data'] = $this->m_pendeta->get_all_pendeta();

		$this->data['breadcrumb']  = 'Data Pendeta';

		$this->data['main_view']   = 'admin/v_pendeta';

		$this->load->view('theme/admintemplate', $this->data);
	}

	function simpan_pendeta()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
				$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_pendeta->simpan_pendeta($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
				$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
				redirect('admin/pendeta');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('admin/pendeta');
			}
		} else {
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
			$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
			$mapel = strip_tags($this->input->post('xmapel'));

			$this->m_pendeta->simpan_pendeta_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
			$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
			redirect('admin/pendeta');
		}
	}

	function update_pendeta()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './assets/images/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nip = strip_tags($this->input->post('xnip'));
				$nama = strip_tags($this->input->post('xnama'));
				$jenkel = strip_tags($this->input->post('xjenkel'));
				$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
				$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
				$mapel = strip_tags($this->input->post('xmapel'));

				$this->m_pendeta->update_pendeta($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
				$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
				redirect('admin/pendeta');
			} else {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/pendeta');
			}
		} else {
			$kode = $this->input->post('kode');
			$nip = strip_tags($this->input->post('xnip'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
			$tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
			$mapel = strip_tags($this->input->post('xmapel'));
			$this->m_pendeta->update_pendeta_tanpa_img($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
			$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
			redirect('admin/pendeta');
		}
	}

	function hapus_pendeta()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_pendeta->hapus_pendeta($kode);
		echo $this->session->set_flashdata('hapus', 'Data berhasil dihapus.');
		redirect('admin/pendeta');
	}
}
