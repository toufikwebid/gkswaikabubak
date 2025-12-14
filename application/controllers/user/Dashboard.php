<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        if (!$this->session->userdata('logged_in')) {
            redirect('user/auth');
        }
    }
    function index()
    {
        $jemaat_id = $this->session->userdata('id');

        if ($jemaat_id) {
            $this->data['iduser'] = $this->session->userdata('id');
            $this->data['user'] = $this->m_user->get_user_by_id($jemaat_id);
            $this->data['breadcrumb'] = 'Data Jemaat';
            $this->data['main_view'] = 'user/v_management_user';
            $this->load->view('theme/usertemplate', $this->data);
        } else {
            // Handle kasus ketika jemaat_id tidak ada di session
            $this->session->set_flashdata('error', 'Jemaat ID tidak ditemukan.');
            redirect('user/auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/auth');
    }

    public function get_upcoming_events()
    {
        $this->load->model('m_upcoming_event');
        $data['events'] = $this->m_upcoming_event->get_all_events();
        $this->load->view('user/v_upcoming_event', $data);
    }

    public function get_management_users()
    {
        $this->load->model('m_user');
        $data['users'] = $this->m_user->get_all_users();
        $this->load->view('user/v_management_user', $data);
    }
}
