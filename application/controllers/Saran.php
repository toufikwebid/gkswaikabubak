<?php
class Saran extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengunjung');
        $this->load->model('SaranModel');
		$this->m_pengunjung->count_visitor();
	}
	function index()
	{
		// Menambahkan data title
		$this->data['title2'] = 'Saran';
		$this->data['main_view']   = 'depan/v_saran';


		$this->data['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
		$this->data['tot_siswa'] = $this->db->get('tbl_jemaat')->num_rows();
		$this->data['tot_files'] = $this->db->get('tbl_files')->num_rows();
		$this->data['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$this->data['saran'] = $this->SaranModel->get_all();
		$this->load->view('theme/template', $this->data);
	}
    public function save() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        );

        if ($this->SaranModel->save($data)) {
            $this->session->set_flashdata('success', 'Saran berhasil dikirim!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim saran.');
        }

        redirect('saran');
    }
}
