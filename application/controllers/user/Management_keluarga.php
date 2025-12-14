<?php
class Management_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_jemaat');
        $this->load->model('m_user');
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }

    function index()
    {
        $no_kk =  $this->session->userdata('no_kk');
        $this->data['data'] = $this->m_jemaat->get_jemaat_by_kk($no_kk);


        // // Debugging
        // echo '<pre>';
        // print_r($this->data['data']);
        // echo '</pre>';
        // exit;

        $this->data['breadcrumb']  = 'Data Keluarga';
        $this->data['main_view']   = 'user/v_management_keluarga';
        $this->load->view('theme/usertemplate', $this->data);
    }

    function edit($jemaat_id)
    {
        // Ambil data jemaat berdasarkan jemaat_id
        $this->data['jemaat'] = $this->m_jemaat->get_jemaat_by_id($jemaat_id);
        if (!$this->data['jemaat']) {
            show_404();
        }

        $this->data['breadcrumb']  = 'Edit Jemaat';

        $this->data['main_view']   = 'user/v_jemaat_edit';

        $this->load->view('theme/usertemplate', $this->data);
    }

    function simpan_jemaat()
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

                $this->m_jemaat->simpan_jemaat($photo);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                redirect('user/management_keluarga');
            } else {
                $this->session->set_flashdata('msg', 'warning');
                redirect('user/management_keluarga');
            }
        } else {
            $this->m_jemaat->simpan_jemaat_tanpa_img();
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('user/management_keluarga');
        }
    }

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

        // Handle upload photo
        $photo = null;
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'jemaat_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $photo = $upload_data['file_name'];

                // Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $photo;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 300;
                $config['height'] = 300;
                $config['new_image'] = './assets/images/' . $photo;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // Hapus gambar lama jika ada
                $gambar_lama = $this->input->post('gambar');
                if (!empty($gambar_lama)) {
                    $path = './assets/images/' . $gambar_lama;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }

                $data['photo'] = $photo;
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('user/management_keluarga');
            }
        }

        // Update data
        if ($this->m_user->update_user($jemaat_id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
        }

        redirect('user/management_keluarga');
    }
    public function hapus_jemaat()
    {
        // Periksa apakah jemaat_id ada di database

        // Hapus foto jika ada
        // $gambar_lama = $jemaat->photo;

        // Hapus gambar terkait dengan no_kk
        $jemaat_id = $this->input->post('kode');
        $gambar  = $this->input->post('gambar');
        if (!empty($gambar)) {
            $path = './assets/images/' . $gambar; // Sesuaikan dengan path gambar Anda
            if (file_exists($path)) {
                unlink($path);
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
}
