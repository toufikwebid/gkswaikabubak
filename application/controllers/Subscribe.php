<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscribe extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_subscribers.email]');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kirim pesan error
            $response = array('status' => 'error', 'message' => validation_errors());
        } else {
            // Jika validasi berhasil, simpan email ke database
            $email = $this->input->post('email');
            $data = array(
                'email' => $email
            );

            if ($this->db->insert('tbl_subscribers', $data)) {
                $response = array('status' => 'success', 'message' => 'Berhasil berlangganan!');
            } else {
                $response = array('status' => 'error', 'message' => 'Terjadi kesalahan saat berlangganan.');
            }
        }

        // Kirim respons JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
