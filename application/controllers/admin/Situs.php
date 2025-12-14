<?php
class Situs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin_logged_in') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_situs');
        $this->load->model('m_pengguna');
        $this->load->model('m_kelas');
        $this->load->library('upload');
    }
    function index()
    {
        $this->data['data'] = $this->m_situs->get_all_situs();
        $this->data['breadcrumb']  = 'Data Situs';
        $this->data['main_view']   = 'admin/v_situs';
        $this->load->view('theme/admintemplate', $this->data);
    }

    function update_situs()
    {

        $config['upload_path'] = './style/img/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = false; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['xfav']['name'])) {
            if ($this->upload->do_upload('xfav')) {
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
                $gambar = $this->input->post('gbrfav');
                $path = './style/img/' . $gambar;
                unlink($path);
                $fav = $gbr['file_name'];
                $kode = 1;
                $nama = strip_tags($this->input->post('xnama'));
                $deskripsi = strip_tags($this->input->post('xdeskripsi'));
                $quotes = strip_tags($this->input->post('xquotes'));
                $footer = strip_tags($this->input->post('xfooter'));
                $visimisi = strip_tags($this->input->post('xvisimisi'));
                $sambutan = strip_tags($this->input->post('xsambutan'));
                $hp = strip_tags($this->input->post('xhp'));
                $email = strip_tags($this->input->post('xemail'));

                $this->m_situs->update_situsxfav($kode, $nama,  $fav, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                // redirect('admin/situs');
            }
        }
        if (!empty($_FILES['xlogo']['name'])) {
            if ($this->upload->do_upload('xlogo')) {
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
                $gambar = $this->input->post('gbrlogo');
                $path = './style/img/' . $gambar;
                unlink($path);
                $logo = $gbr['file_name'];
                $kode = 1;
                $nama = strip_tags($this->input->post('xnama'));
                $deskripsi = strip_tags($this->input->post('xdeskripsi'));
                $quotes = strip_tags($this->input->post('xquotes'));
                $footer = $this->input->post('xfooter');
                $visimisi = strip_tags($this->input->post('xvisimisi'));
                $sambutan = strip_tags($this->input->post('xsambutan'));
                $hp = strip_tags($this->input->post('xhp'));
                $email = strip_tags($this->input->post('xemail'));

                $this->m_situs->update_situsxlogo($kode, $nama,  $logo, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                // redirect('admin/situs');
            }
        }
        if (!empty($_FILES['xpen']['name'])) {
            if ($this->upload->do_upload('xpen')) {
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
                $gambar = $this->input->post('gbrpen');
                $path = './style/img/' . $gambar;
                unlink($path);
                $pendeta = $gbr['file_name'];
                $kode = 1;
                $nama = strip_tags($this->input->post('xnama'));
                $deskripsi = strip_tags($this->input->post('xdeskripsi'));
                $quotes = strip_tags($this->input->post('xquotes'));
                $footer = strip_tags($this->input->post('xfooter'));
                $visimisi = strip_tags($this->input->post('xvisimisi'));
                $sambutan = strip_tags($this->input->post('xsambutan'));
                $hp = strip_tags($this->input->post('xhp'));
                $email = strip_tags($this->input->post('xemail'));

                $this->m_situs->update_situsxpen($kode, $nama,  $pendeta, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
                // redirect('admin/situs');
            }
        } else {
            $kode = 1;
            $nama = strip_tags($this->input->post('xnama'));
            $deskripsi = strip_tags($this->input->post('xdeskripsi'));
            $quotes = strip_tags($this->input->post('xquotes'));
            $footer = $this->input->post('xfooter');
            $visimisi = strip_tags($this->input->post('xvisimisi'));
            $sambutan = strip_tags($this->input->post('xsambutan'));
            $hp = strip_tags($this->input->post('xhp'));
            $email = strip_tags($this->input->post('xemail'));
            $this->m_situs->update_situs_tanpa_img($kode, $nama, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('admin/situs');
        }
        redirect('admin/situs');
    }
}
