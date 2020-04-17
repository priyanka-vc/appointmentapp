<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation', 'session']);
        $this->load->helper('dropdown_helper');
    }

    public function index()
	{
        $this->load->view('header');
        $this->load->view('welcome');
        $this->load->view('footer');
	}


    public function doctor_dashboard()
    {
        $this->load->view('header');
        $this->load->view('doctors/dashboard');
        $this->load->view('footer');
    }

    public function add_availability()
    {
        $this->load->model('Availability_model', 'availability');

        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('from_time', 'From Time', 'required');
        $this->form_validation->set_rules('to_time', 'To Time', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $this->availability->add(
                $this->session->user_id,
                $this->input->post('date'),
                $this->input->post('from_time'),
                $this->input->post('to_time')
            );
        }

        $this->load->view('header');
        $this->load->view('doctors/add_availibility');
        $this->load->view('footer');
    }
}
