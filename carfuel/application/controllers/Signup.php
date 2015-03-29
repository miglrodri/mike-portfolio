<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index() {
		// TODO preserve the values if there was POST request
		$data['page_title'] = "Registo de nova conta";
		$this->load->view('templates/header', $data);
		$this->load->view('signup');
		$this->load->view('templates/footer');
	}

	public function submit() {
		if ($this->_submit_validate() === FALSE) {
			$this->index();
			return;
		}
		redirect(site_url('/dashboard'));
	}

	private function _submit_validate() {

	}

	// if signup successful, authenticate user automaticaly
	public function auth() {
		// form deve chamar este controller?
		$this->session->set_userdata('email', 'miguel');
		$this->session->set_userdata('id', '17');
		redirect(site_url());
		//return true;
	}
}