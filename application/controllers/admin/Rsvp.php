<?php
class Rsvp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        	if ($this->session->userdata('admin_logged_in') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
        $this->load->model('M_upcoming_event');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->data['agendas'] = $this->M_upcoming_event->get_agendas();
        $this->data['breadcrumb']  = 'Data RSVP';

        $this->data['main_view']   = 'admin/v_rsvp';

        $this->load->view('theme/admintemplate', $this->data);
    }

    public function detail($agenda_id)
    {
        $data['rsvps'] = $this->M_upcoming_event->get_rsvps_by_agenda($agenda_id);
        if (empty($data['rsvps'])) {
            $this->session->set_flashdata('success', 'Tidak terdapat RSVP pada Acara ini!');
            redirect('admin/rsvp');
        } else {
            $this->data['rsvps'] = $this->M_upcoming_event->get_rsvps_by_agenda($agenda_id);
            $this->data['breadcrumb']  = 'Detail Data RSVP';

            $this->data['main_view']   = 'admin/v_rsvp_detail';

            $this->load->view('theme/admintemplate', $this->data);
        }
    }
}
