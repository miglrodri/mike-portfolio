<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $userId = NULL;

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		if (!$this->session->userdata('email')) {
			// not logged in
			redirect(site_url().'/login');
		}
		else {
			$this->userId = $this->session->userdata('id');
			$this->load->model('car');
			$this->load->model('item');
		}
	}

	public function index() {
		$data['user_email'] = $this->session->userdata('email');
		$data['user_id'] = $this->session->userdata('id');
		$data['page_title'] = 'Gestão de abastecimentos';

		// vai verificar se o user tem carros
		$data['cars'] = $this->car->getAll($this->userId);

		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/templates/footer');
	}
}