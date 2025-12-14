<?php
class Footer extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('m_situs');
    }

    function index()
    {

        $this->data['data'] = $this->m_situs->get_all_situs();

        $this->data['breadcrumb']  = 'Data Situs';


        $this->load->view('theme/template', $this->data);
    }
}
