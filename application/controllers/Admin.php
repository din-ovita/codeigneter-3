<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $this->load->view('admin/index');
    }

    public function siswa()
    {
        $data['result'] = $this->m_model->get_siswa();
        $this->load->view('admin/siswa', $data);
    }
}
