<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {

	public $userId = NULL;

	public function __construct() {
		parent::__construct();
		$this->load->model('car');
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			// not logged in
			redirect(site_url().'/dashboard');
		}
		else {
			$this->userId = $this->session->userdata('id');
		}
	}

	public function index() {
		//echo 'user cars list in json';
		$data = $this->car->getAll($this->userId);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function show($id = -1) {
		//echo 'get the car in json with id: '.$id;
		if ($data['cars'] = $this->car->get($this->userId, $id)) {

			$this->load->helper('form');
			
			$data['user_email'] = $this->session->userdata('email');
			$data['user_id'] = $this->session->userdata('id');
			$data['page_title'] = 'Abastecimentos para o carro '.$data['cars'][0]['name'];
			
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/cars/show', $data);
			$this->load->view('backend/templates/footer');

			//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
		else {
			//echo 'faz redirect porque não tem acesso a este carro';
			redirect(site_url('/dashboard'));
		}
	}

	public function create() {
		//echo 'create the car with the following data: '.print_r($data);
		$now = new DateTime();
		$data = array(
				'name' => $this->input->post('name', TRUE),
				'userId' => $this->userId,
				'created_at' => $now->format('Y-m-d H:i:s'),
				'modified_at' => $now->format('Y-m-d H:i:s'),
			);		
		$data['insertId'] = $this->car->insert($data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit() {
		//echo 'edit the car with id: '.$id;
		$now = new DateTime();
		$data = array(
				'id' => $this->input->post('id', TRUE),
				'name' => $this->input->post('name', TRUE),
				'userId' => $this->userId,
				'modified_at' => $now->format('Y-m-d H:i:s'),
			);

		if (!$this->car->edit($this->userId, $data)) {
			$data ='';
			$data['error'] = 'carro não existe ou não pertence a este user';
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function delete() {
		//echo 'delete the car with id: '.$id;
		$data ['name'] = ($this->car->delete($this->userId, $this->input->post('id', TRUE))) ? 'deleted success' : 'deleted error';
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

}