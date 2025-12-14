<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upcoming_event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_upcoming_event');
        $this->load->model('m_user');
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
    }

  public function index()
{
    $jemaat_id = $this->session->userdata('id');

    if ($jemaat_id) {
        $this->data['iduser'] = $this->session->userdata('id');
        $this->data['events'] = $this->m_upcoming_event->get_all_events();
        $this->data['user'] = $this->m_user->get_user_by_id($jemaat_id);
        $this->data['breadcrumb']  = 'UPCOMING EVENT';

        // Memformat tanggal sebelum mengirim ke view
        if (!empty($this->data['events'])) {
            foreach ($this->data['events'] as &$event) {
                $event['event_date'] = $this->format_date($event['event_date']);
                // Memeriksa apakah jemaat sudah RSVP untuk agenda ini
                if ($event['type'] === 'Agenda' && isset($event['agenda_id'])) {
                    $event['is_rsvped'] = $this->m_upcoming_event->is_rsvped($jemaat_id, $event['agenda_id']);
                } elseif ($event['type'] === 'Pengumuman' && isset($event['pengumuman_id'])) {
                    $event['is_rsvped'] = $this->m_upcoming_event->is_rsvped($jemaat_id, null, $event['pengumuman_id']);
                } else {
                    $event['is_rsvped'] = false;
                }
            }
        } else {
            $this->data['events'] = []; // Pastikan $events adalah array kosong jika tidak ada event
        }

        $this->data['main_view']   = 'user/v_upcoming_event';

        $this->load->view('theme/usertemplate', $this->data);
    } else {
        // Handle kasus ketika jemaat_id tidak ada di session
        $this->session->set_flashdata('error', 'Jemaat ID tidak ditemukan.');
        redirect('user/auth');
    }
}



    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/v_upcoming_event');
        } else {
            $data = array(
                'judul' => $this->input->post('title'),
                'deskripsi' => $this->input->post('description'),
                'tanggal_agenda' => $this->input->post('event_date'),
                'tanggal_pengumuman' => $this->input->post('event_date'),
                'type' => $this->input->post('type')
            );

            // Mengatur kolom yang sesuai dengan tabel
            if ($data['type'] === 'Agenda') {
                unset($data['tanggal_pengumuman']);
            } elseif ($data['type'] === 'Pengumuman') {
                unset($data['tanggal_agenda']);
            }

            $this->m_upcoming_event->add_event($data);
            redirect('user/upcoming_event');
        }
    }

    public function rsvp()
    {
        $jemaat_id = $this->session->userdata('id');
        $pengumuman_id = $this->input->post('pengumuman_id');
        $agenda_id = $this->input->post('agenda_id');
        $event_date = $this->input->post('event_date');
        $judul = $this->input->post('title');
        $type = $this->input->post('type');

        // Mengatur pengumuman_id dan agenda_id menjadi NULL jika kosong
        if (empty($pengumuman_id)) {
            $pengumuman_id = NULL;
        }
        if (empty($agenda_id)) {
            $agenda_id = NULL;
        }

        $data = array(
            'jemaat_id' => $jemaat_id,
            'pengumuman_id' => $pengumuman_id,
            'agenda_id' => $agenda_id,
            'event_date' => $event_date,
            'judul' => $judul,
            'type' => $type
        );

        if ($this->m_upcoming_event->add_rsvp($data)) {
            $this->session->set_flashdata('success', 'RSVP berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan RSVP.');
        }

        redirect('user/upcoming_event');
    }

    // Fungsi untuk memformat tanggal
    private function format_date($dateString)
    {
        $bulanIndonesia = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $date = new DateTime($dateString);
        $bulan = $date->format('F');
        $formattedDate = $date->format('d ') . $bulanIndonesia[$bulan] . $date->format(' Y');
        return $formattedDate;
    }
}
