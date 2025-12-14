<?php
class Jemaat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_jemaat');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
		$this->load->model('m_user');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function index()
	{
		// Ambil data yang dikelompokkan berdasarkan no_kk
		$this->data['data'] = $this->m_jemaat->get_jemaat_by_no_kk();

		$this->data['breadcrumb']  = 'Data Jemaat';

		$this->data['main_view']   = 'admin/v_jemaat';

		$this->load->view('theme/admintemplate', $this->data);
	}

	function edit($jemaat_id)
	{
		// Ambil data jemaat berdasarkan jemaat_id
		$this->data['jemaat'] = $this->m_jemaat->get_jemaat_by_id($jemaat_id);
		if (!$this->data['jemaat']) {
			show_404();
		}

		$this->data['breadcrumb']  = 'Edit Jemaat';

		$this->data['main_view']   = 'admin/v_jemaat_edit';

		$this->load->view('theme/admintemplate', $this->data);
	}

	public function insert()
	{
		// Prepare data for insert
		$pelayanan = $this->input->post('pelayanan') ?: [];
		$data = [
			'wilayah_pelayanan' => $this->input->post('wilayah_pelayanan'),
			'alamat' => $this->input->post('alamat'),
			'no_kk' => $this->input->post('no_kk'),
			'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
			'nama' => $this->input->post('nama'),
			'peran_dalam_keluarga' => $this->input->post('peran_dalam_keluarga'),
			'anak_ke' => $this->input->post('anak_ke'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'umur' => $this->input->post('umur'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'golongan_darah' => $this->input->post('golongan_darah'),
			'pendonor' => $this->input->post('pendonor'),
			'pelayanan' => json_encode($pelayanan, JSON_UNESCAPED_SLASHES),
			'tanggal_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('tanggal_baptis') : null,
			'pendeta_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('pendeta_baptis') : null,
			'tanggal_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('tanggal_sidi') : null,
			'pendeta_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('pendeta_sidi') : null,
			'tanggal_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('tanggal_nikah') : null,
			'pendeta_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('pendeta_nikah') : null,
			'perjamuan_kudus' => $this->input->post('perjamuan_kudus') ? 1 : 0,
			'pks_part_kali' => in_array('PKS/PART', $pelayanan) ? $this->input->post('pks_part_kali') : null,
			'hp' => $this->input->post('hp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		];
		// Mengubah array pelayanan menjadi string JSON
		if (isset($data['pelayanan'])) {
			$data['pelayanan'] = $data['pelayanan'];
		}
		// Handle upload photo
		$photo = null;
		if (!empty($_FILES['photo']['name'])) {
			$config['upload_path'] = FCPATH . 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048; // 2MB
			$config['file_name'] = 'jemaat_' . time();

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {
				$upload_data = $this->upload->data();
				$photo = $upload_data['file_name'];

				// Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = $config['upload_path'] . $photo;
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = $config['upload_path'] . $photo;
				$this->load->library('image_lib', $config);
				if (!$this->image_lib->resize()) {
					$this->session->set_flashdata('error', $this->image_lib->display_errors());
					redirect('admin/data_jemaat');
				}

				$data['photo'] = $photo;
			} else {
				$this->session->set_flashdata('error', 'bagian 2' + $this->upload->display_errors());
				redirect('admin/data_jemaat');
			}
		}

		// Update data
		if ($this->M_jemaat->insert_jemaat($data)) {
			$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
		} else {
			$this->session->set_flashdata('error', 'Gagal memperbarui data.');
		}

		redirect('admin/data_jemaat');
	}

	// public function insert()
	// {

	// 	// Prepare data for insert
	// 	$pelayanan = $this->input->post('pelayanan') ?: [];
	// 	$data = [
	// 		'wilayah_pelayanan' => $this->input->post('wilayah_pelayanan'),
	// 		'alamat' => $this->input->post('alamat'),
	// 		'no_kk' => $this->input->post('no_kk'),
	// 		'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
	// 		'nama' => $this->input->post('nama'),
	// 		'peran_dalam_keluarga' => $this->input->post('peran_dalam_keluarga'),
	// 		'anak_ke' => $this->input->post('anak_ke'),
	// 		'tempat_lahir' => $this->input->post('tempat_lahir'),
	// 		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
	// 		'umur' => $this->input->post('umur'),
	// 		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
	// 		'pekerjaan' => $this->input->post('pekerjaan'),
	// 		'golongan_darah' => $this->input->post('golongan_darah'),
	// 		'pendonor' => $this->input->post('pendonor'),
	// 		'pelayanan' => json_encode($pelayanan, JSON_UNESCAPED_SLASHES),
	// 		'tanggal_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('tanggal_baptis') : null,
	// 		'pendeta_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('pendeta_baptis') : null,
	// 		'tanggal_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('tanggal_sidi') : null,
	// 		'pendeta_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('pendeta_sidi') : null,
	// 		'tanggal_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('tanggal_nikah') : null,
	// 		'pendeta_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('pendeta_nikah') : null,
	// 		'perjamuan_kudus' => $this->input->post('perjamuan_kudus') ? 1 : 0,
	// 		'pks_part_kali' => in_array('PKS/PART', $pelayanan) ? $this->input->post('pks_part_kali') : null,
	// 		'hp' => $this->input->post('hp'),
	// 		'email' => $this->input->post('email'),
	// 		'password' => $this->input->post('password'),
	// 	];

	// 	// Handle upload photo
	// 	$photo = null;
	// 	if (!empty($_FILES['photo']['name'])) {
	// 		$config['upload_path'] = './assets/images/';
	// 		$config['allowed_types'] = 'gif|jpg|png';
	// 		$config['max_size'] = 2048; // 2MB
	// 		$config['file_name'] = 'jemaat_' . time();

	// 		$this->load->library('upload', $config);

	// 		if ($this->upload->do_upload('photo')) {
	// 			$upload_data = $this->upload->data();
	// 			$photo = $upload_data['file_name'];

	// 			// Compress Image
	// 			$config['image_library'] = 'gd2';
	// 			$config['source_image'] = './assets/images/' . $photo;
	// 			$config['create_thumb'] = FALSE;
	// 			$config['maintain_ratio'] = FALSE;
	// 			$config['quality'] = '60%';
	// 			$config['width'] = 300;
	// 			$config['height'] = 300;
	// 			$config['new_image'] = './assets/images/' . $photo;
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();

	// 			// // Hapus gambar lama jika ada
	// 			// $gambar_lama = $this->input->post('gambar');
	// 			// if (!empty($gambar_lama)) {
	// 			// 	$path = './assets/images/' . $gambar_lama;
	// 			// 	if (file_exists($path)) {
	// 			// 		unlink($path);
	// 			// 	}
	// 			// }

	// 			// $data['photo'] = $photo;
	// 		} else {
	// 			$this->session->set_flashdata('error', $this->upload->display_errors());
	// 			redirect('admin/data_jemaat');
	// 		}
	// 	}

	// 	// Update data
	// 	if ($this->M_jemaat->insert_jemaat($data)) {
	// 		$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Gagal memperbarui data.');
	// 	}

	// 	redirect('admin/data_jemaat');
	// }

	public function update()
	{
		$jemaat_id = $this->input->post('jemaat_id');

		if (!$jemaat_id) {
			$this->session->set_flashdata('error', 'Jemaat ID tidak ditemukan.');
			redirect('user/Management_user');
		}

		// Prepare data for update
		$pelayanan = $this->input->post('pelayanan') ?: [];
		$data = [
			'wilayah_pelayanan' => $this->input->post('wilayah_pelayanan'),
			'alamat' => $this->input->post('alamat'),
			'no_kk' => $this->input->post('no_kk'),
			'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
			'nama' => $this->input->post('nama'),
			'peran_dalam_keluarga' => $this->input->post('peran_dalam_keluarga'),
			'anak_ke' => $this->input->post('anak_ke'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'umur' => $this->input->post('umur'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'golongan_darah' => $this->input->post('golongan_darah'),
			'pendonor' => $this->input->post('pendonor'),
			'pelayanan' => json_encode($pelayanan, JSON_UNESCAPED_SLASHES),
			'tanggal_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('tanggal_baptis') : null,
			'pendeta_baptis' => in_array('Baptis', $pelayanan) ? $this->input->post('pendeta_baptis') : null,
			'tanggal_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('tanggal_sidi') : null,
			'pendeta_sidi' => in_array('Sidi', $pelayanan) ? $this->input->post('pendeta_sidi') : null,
			'tanggal_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('tanggal_nikah') : null,
			'pendeta_nikah' => in_array('Nikah', $pelayanan) ? $this->input->post('pendeta_nikah') : null,
			'perjamuan_kudus' => $this->input->post('perjamuan_kudus') ? 1 : 0,
			'pks_part_kali' => in_array('PKS/PART', $pelayanan) ? $this->input->post('pks_part_kali') : null,
			'hp' => $this->input->post('hp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			//     'status_perkawinan' => $this->input->post('status_perkawinan'),
			//     'agama' => $this->input->post('agama'),
			//     'status_keanggotaan' => $this->input->post('status_keanggotaan'),
			//     'tanggal_gabung' => $this->input->post('tanggal_gabung'),
		];

		// Mengunggah foto
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 10000; // 2MB
		$config['file_name'] = 'jemaat' . '_' . $_FILES['photo']['name'];

		$this->load->library('upload', $config);
		$gbr = $this->upload->data();

		if (!empty($_FILES['photo']['name'])) {
			if (!$this->upload->do_upload('photo')) {
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
				$error = array('error' => $this->upload->display_errors());
				echo $error['error']; // Tampilkan pesan error unggah foto
				return;
			} else {
				$upload_data = $this->upload->data();
				$data['photo'] = $upload_data['file_name'];
			}
		} else {
			$data['photo'] = ''; // Jika foto tidak diunggah, simpan sebagai string kosong
		}


		if ($this->m_user->update_user($jemaat_id, $data)) {
			$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
		} else {
			$this->session->set_flashdata('error', 'Gagal memperbarui data.');
		}

		redirect('admin/data_jemaat');
	}

	function detail($no_kk)
	{
		// Ambil data jemaat berdasarkan no_kk
		$data = $this->m_jemaat->get_jemaat_by_no_kk_detail($no_kk);

		// Kembalikan data dalam format JSON
		echo json_encode($data);
	}
	public function hapus_kk()
	{
		$kode = $this->input->post('kode');

		// Hapus gambar terkait dengan no_kk
		$gambar = $this->m_jemaat->get_gambar_by_no_kk($kode);
		if (!empty($gambar)) {
			foreach ($gambar as $img) {
				$path = './assets/images/' . $img->photo; // Sesuaikan dengan path gambar Anda
				if (file_exists($path)) {
					unlink($path);
				}
			}
		}

		// Hapus data jemaat terkait dengan no_kk
		$this->m_jemaat->hapus_jemaat_by_no_kk($kode);

		// Redirect atau berikan pesan sukses
		$this->session->set_flashdata('success', 'Data dan gambar terkait berhasil dihapus.');
		redirect('admin/data_jemaat'); // Sesuaikan dengan URL yang Anda inginkan
	}


	public function hapus($jemaat_id)
	{
		// Periksa apakah jemaat_id ada di database

		// Hapus foto jika ada
		// $gambar_lama = $jemaat->photo;

		// Hapus gambar terkait dengan no_kk
		$gambar = $this->M_jemaat->get_gambar_by_no_kk($jemaat_id);
		if (!empty($gambar)) {
			foreach ($gambar as $img) {
				$path = './assets/images/' . $img->photo; // Sesuaikan dengan path gambar Anda
				if (file_exists($path)) {
					unlink($path);
				}
			}
		}
		// if (!empty($gambar_lama) && file_exists('./assets/images/' . $gambar_lama)) {
		// 	unlink('./assets/images/' . $gambar_lama);
		// }
		// Hapus data dari database
		$this->m_jemaat->delete_jemaat($jemaat_id);
		echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
		$this->session->set_flashdata('success', 'Data dan gambar terkait berhasil dihapus.');
	}
	public function hapus_jemaat($jemaat_id)
	{
	
		if ($this->m_jemaat->hapus_jemaat($jemaat_id)) {
			$this->session->set_flashdata('success', 'Data dan gambar terkait berhasil dihapus.');
			redirect('admin/data_jemaat');
		} else {
			$this->session->set_flashdata('error',  'Gagal menghapus data.');
		}
	}
}
