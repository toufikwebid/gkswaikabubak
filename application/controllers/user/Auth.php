<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('user/v_login');
    }

    public function authenticate()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->m_user->get_user_by_email($email, $password);

        if ($user && $password) {
            $session_data = array(
                'id' => $user->jemaat_id,
                'username' => $user->email,
                'name' => $user->nama,
                'no_kk' => $user->no_kk,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('user/management_user');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('user/auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('no_kk');
        $this->session->unset_userdata('logged_in');
        redirect('user/auth');
    }
}
