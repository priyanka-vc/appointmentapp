<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


    public function doctor_dashboard()
    {
        $this->load->view('header');
        $this->load->view('doctors/dashboard');
        $this->load->view('footer');
    }

    public function add_availability()
    {
        $this->load->view('header');
        $this->load->view('doctors/add_availibility');
        $this->load->view('footer');
    }
}
