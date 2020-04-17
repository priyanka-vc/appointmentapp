<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation', 'session']);
        $this->load->model('Availability_model', 'availability');
        $this->load->model('Appointments_model', 'appointments');

        if (!$this->ion_auth->logged_in() || $this->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be logged-in as patient to view this page.');
        }
    }

    public function index()
	{
	    $slots = $this->availability->get_todays_available_slots();
	    $appointments = $this->appointments->get_appointments_of_patient($this->session->user_id);
	    $this->load->view('header');
        $this->load->view('patients/dashboard', [
            'slots' => $slots,
            'appointments' => $appointments
        ]);
        $this->load->view('footer');
	}
}
