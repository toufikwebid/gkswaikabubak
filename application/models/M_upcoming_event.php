<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_upcoming_event extends CI_Model
{

   public function get_all_events()
{
    // Mengambil data dari tbl_agenda dengan kondisi event_date di atas hari ini
    $this->db->select('agenda_id, agenda_nama AS title, agenda_deskripsi AS description, agenda_mulai AS event_date, "Agenda" AS type');
    $this->db->from('tbl_agenda');
    $this->db->where('agenda_mulai > CURDATE()');
    $query_agenda = $this->db->get();

    // Mengambil data dari tbl_pengumuman dengan kondisi event_date di atas hari ini
    $this->db->select('pengumuman_id, pengumuman_judul AS title, pengumuman_deskripsi AS description, pengumuman_tanggal AS event_date, "Pengumuman" AS type');
    $this->db->from('tbl_pengumuman');
    $this->db->where('pengumuman_tanggal > CURDATE()');
    $query_pengumuman = $this->db->get();

    // Menggabungkan hasil dari kedua query
    $events = $query_agenda->result_array();
    $pengumuman = $query_pengumuman->result_array();

    // Menggabungkan kedua array
    $all_events = array_merge($events, $pengumuman);

    // Mengurutkan berdasarkan tanggal
    usort($all_events, function ($a, $b) {
        return strtotime($a['event_date']) - strtotime($b['event_date']);
    });

    return $all_events;
}

    public function get_agendas()
    {
        $this->db->select('tbl_agenda.agenda_id, tbl_agenda.agenda_nama, tbl_agenda.agenda_mulai');
        $this->db->from('tbl_agenda');
        $this->db->join('tbl_rsvp', 'tbl_agenda.agenda_id = tbl_rsvp.agenda_id', 'left');
        $this->db->group_by('tbl_agenda.agenda_id');
        $this->db->order_by('tbl_agenda.agenda_mulai', 'DESC'); // Mengurutkan dari terbaru ke terlama
        $query = $this->db->get();
        $agendas = $query->result();

        // Memformat tanggal
        foreach ($agendas as &$agenda) {
            $agenda->agenda_mulai = $this->format_tanggal($agenda->agenda_mulai);
        }

        return $agendas;
    }
    public function add_rsvp($data)
    {
        return $this->db->insert('tbl_rsvp', $data);
    }

    public function get_rsvps_by_agenda($agenda_id)
    {
        $this->db->select('tbl_rsvp.*, tbl_jemaat.nama');
        $this->db->from('tbl_rsvp');
        $this->db->join('tbl_jemaat', 'tbl_rsvp.jemaat_id = tbl_jemaat.jemaat_id');
        $this->db->where('tbl_rsvp.agenda_id', $agenda_id);
        return $this->db->get()->result();
        foreach ($query as $row) {
            $row->event_date = $this->format_tanggal($row->event_date);
        }
    }
   public function is_rsvped($jemaat_id, $agenda_id = null, $pengumuman_id = null)
{
    $this->db->where('jemaat_id', $jemaat_id);

    if ($agenda_id !== null) {
        $this->db->where('agenda_id', $agenda_id);
    }

    if ($pengumuman_id !== null) {
        $this->db->where('pengumuman_id', $pengumuman_id);
    }

    $query = $this->db->get('tbl_rsvp');
    return $query->num_rows() > 0;
}

    private function format_tanggal($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        $date = date('d n Y', strtotime($tanggal));
        list($day, $month, $year) = explode(' ', $date);
        return $day . ' ' . $bulan[(int)$month] . ' ' . $year;
    }
}
