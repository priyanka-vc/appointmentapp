<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation', 'session']);
        $this->load->helper('dropdown_helper');
        //comment
    }

    public function index()
	{
        $this->load->view('header');
        $this->load->view('welcome');
        $this->load->view('footer');
	}
}
