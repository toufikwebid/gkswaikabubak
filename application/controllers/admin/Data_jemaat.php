<?php
class Data_jemaat extends CI_Controller
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
    }


    function index()
    {

        $this->data['data'] = $this->m_jemaat->get_all_jemaatbaru();

        $this->data['breadcrumb']  = 'Data jemaat';

        $this->data['main_view']   = 'admin/v_data_jemaat';

        $this->load->view('theme/admintemplate', $this->data);
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
                $nip = strip_tags($this->input->post('xnip'));
                $nama = strip_tags($this->input->post('xnama'));
                $jenkel = strip_tags($this->input->post('xjenkel'));
                $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
                $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
                $mapel = strip_tags($this->input->post('xmapel'));

                $this->m_jemaat->simpan_jemaat($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                redirect('admin/jemaat');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('admin/jemaat');
            }
        } else {
            $nip = strip_tags($this->input->post('xnip'));
            $nama = strip_tags($this->input->post('xnama'));
            $jenkel = strip_tags($this->input->post('xjenkel'));
            $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
            $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
            $mapel = strip_tags($this->input->post('xmapel'));

            $this->m_jemaat->simpan_jemaat_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('admin/jemaat');
        }
    }

    function update_jemaat()
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

                $this->m_jemaat->update_jemaat($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                redirect('admin/jemaat');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/jemaat');
            }
        } else {
            $kode = $this->input->post('kode');
            $nip = strip_tags($this->input->post('xnip'));
            $nama = strip_tags($this->input->post('xnama'));
            $jenkel = strip_tags($this->input->post('xjenkel'));
            $tmp_lahir = strip_tags($this->input->post('xtmp_lahir'));
            $tgl_lahir = strip_tags($this->input->post('xtgl_lahir'));
            $mapel = strip_tags($this->input->post('xmapel'));
            $this->m_jemaat->update_jemaat_tanpa_img($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('admin/jemaat');
        }
    }

    function hapus_jemaat()
    {
        $kode = $this->input->post('kode');
        $gambar = $this->input->post('gambar');
        $path = './assets/images/' . $gambar;
        unlink($path);
        $this->m_jemaat->hapus_jemaat($kode);
        echo $this->session->set_flashdata('hapus', 'Data berhasil dihapus.');
        redirect('admin/jemaat');
    }
}
