<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation', 'session']);
        $this->load->helper('dropdown_helper');
        $this->load->model('Availability_model', 'availability');
        $this->load->model('Appointments_model', 'appointments');
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            redirect('home','refresh');
        }
    }

    public function index()
    {
        $slots = $this->availability->get_todays_available_slots_of_doctor($this->ion_auth->get_user_id());
        $appointments = $this->appointments->get_appointments_of_doctor($this->session->user_id);
        $this->load->view('header');
        $this->load->view('doctors/dashboard',[
            'slots'=> $slots,
            'appointments' => $appointments
        ]);
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

            redirect("/doctor", 'refresh');

        }

        $this->load->view('header');
        $this->load->view('doctors/add_availibility');
        $this->load->view('footer');
    }
}
