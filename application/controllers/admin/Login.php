<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    function index()
    {

        $this->load->view('admin/v_login');
    }

    function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));
        $u = $username;
        $p = $password;
        $cadmin = $this->m_login->cekadmin($u, $p);

        if ($cadmin->num_rows() > 0) {
            $xcadmin = $cadmin->row_array();
            if ($xcadmin['pengguna_level'] == '1') {
                $session_data = array(
                    'admin_id' => $xcadmin['pengguna_id'],
                    'admin_email' => $xcadmin['pengguna_email'],
                    'admin_name' => $xcadmin['pengguna_nama'],
                    'admin_level' => $xcadmin['pengguna_level'],
                    'admin_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard');
            } else {
                $session_data = array(
                    'admin_id' => $xcadmin['pengguna_id'],
                    'admin_email' => $xcadmin['pengguna_email'],
                    'admin_name' => $xcadmin['pengguna_nama'],
                    'admin_level' => $xcadmin['pengguna_level'],
                    'admin_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
            redirect('admin/login');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_level');
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }
}
