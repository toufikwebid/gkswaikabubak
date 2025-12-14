<?php
class Registrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jemaat');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('string'); // Untuk fungsi random_string
    }

    function index()
    {
        $this->data['title2'] = 'REGISTRASI JEMAAT';
        $this->data['main_view'] = 'admin/v_registrasi';
        $this->load->view('theme/template', $this->data);
    }

    function submit_step1()
    {
        $this->form_validation->set_rules('wilayah_pelayanan', 'Wilayah Pelayanan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // Debugging: Tampilkan pesan error validasi
        } else {
            $data = $this->input->post();
            $this->session->set_userdata('step1', $data);
            echo ''; // Indikasi berhasil
        }
    }

    function step2()
    {
        $this->data['title2'] = 'REGISTRASI JEMAAT';
        $this->data['main_view'] = 'admin/v_registrasi';
        $this->load->view('theme/admintemplate', $this->data);
    }

    function submit_step2()
    {
        $this->form_validation->set_rules('no_kk', 'No. Kartu Keluarga', 'required');
        $this->form_validation->set_rules('nama_kepala_keluarga', 'Nama Kepala Keluarga', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // Debugging: Tampilkan pesan error validasi
        } else {
            $data = $this->input->post();
            $this->session->set_userdata('step2', $data);
            echo ''; // Indikasi berhasil
        }
    }

    function step3()
    {
        $this->data['title2'] = 'REGISTRASI JEMAAT';
        $this->data['main_view'] = 'depan/v_registrasi';
        $this->load->view('theme/admintemplate', $this->data);
    }

    function submit_step3()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('peran_dalam_keluarga', 'Peran Dalam Keluarga', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('pendonor', 'Pendonor', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // Debugging: Tampilkan pesan error validasi
        } else {
            $data = $this->input->post();
            $this->session->set_userdata('step3', $data);
            echo ''; // Indikasi berhasil
        }
    }

    function step4()
    {
        $this->data['title2'] = 'REGISTRASI JEMAAT';
        $this->data['main_view'] = 'admin/v_registrasi';
        $this->load->view('theme/admintemplate', $this->data);
    }

    function submit_step4()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('hp', 'HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors(); // Debugging: Tampilkan pesan error validasi
        } else {
            $data = array_merge(
                $this->session->userdata('step1'),
                $this->session->userdata('step2'),
                $this->session->userdata('step3'),
                $this->input->post()
            );

            // Mengunggah foto
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10000; // 10MB
            $config['file_name'] = 'jemaat_' . random_string('alnum', 10) . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

            $this->load->library('upload', $config);


            if (!empty($_FILES['photo']['name'])) {
                if (!$this->upload->do_upload('photo')) {
                    // Tampilkan pesan error unggah foto
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $data['photo'] = $upload_data['file_name'];

                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/' . $upload_data['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = 300;
                    $config['height'] = 300;
                    $config['new_image'] = './assets/images/' . $upload_data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            } else {
                $data['photo'] = ''; // Jika foto tidak diunggah, simpan sebagai string kosong
            }

            // Debugging: Tampilkan data yang akan disimpan
            log_message('info', 'Data to be inserted: ' . json_encode($data));

            $this->M_jemaat->insert_jemaat($data);
            $this->session->unset_userdata('step1');
            $this->session->unset_userdata('step2');
            $this->session->unset_userdata('step3');
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('admin/data_jemaat'); // Redirect ke halaman success
        }
    }

    function success()
    {
        $this->data['title2'] = 'REGISTRASI JEMAAT';
        $this->data['main_view'] = 'admin/v_jemaat';
        $this->load->view('theme/admintemplate', $this->data);
    }
}
