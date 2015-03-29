<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('item');
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			// not logged in
			redirect(site_url().'/dashboard');
		}
	}

	public function index() {
		//echo 'list of items for a car in json';
		$data = $this->item->getAll($this->input->post('carId', TRUE));
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function create() {
		//echo 'create the item with the following data: '.print_r($data);
		$now = new DateTime();
		$data = array(
				'date' => $this->input->post('date', TRUE),
				'kilometers' => $this->input->post('kilometers', TRUE),
				'liters' => $this->input->post('liters', TRUE),
				'price' => $this->input->post('price', TRUE),
				'carId' => $this->input->post('carId', TRUE),
				'created_at' => $now->format('Y-m-d H:i:s'),
				'modified_at' => $now->format('Y-m-d H:i:s'),
			);		
		$data['insertId'] = $this->item->insert($data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function edit() {
		$this->load->helper('form');
		$this->load->model('car');

		$data['carId'] = $carId = $this->uri->segment(3, 0);
		$data['id'] = $id = $this->uri->segment(5, 0);

		$data['item'] = $this->item->get($carId, $id);
			
		$data['user_email'] = $this->session->userdata('email');
		$data['user_id'] = $this->session->userdata('id');
		$data['page_title'] = 'Editar abastecimento';
		
		$data['carName'] = $this->car->getName($data['user_id'], $carId);

		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/items/edit', $data);
		$this->load->view('backend/templates/footer');
	}

	public function submit() {
		//echo 'edit the item with id: '.$id;
		$now = new DateTime();
		$data = array(
				'id' => $this->input->post('id', TRUE),
				'carId' => $this->input->post('carId', TRUE),
				'date' => $this->input->post('date', TRUE),
				'kilometers' => $this->input->post('kilometers', TRUE),
				'liters' => $this->input->post('liters', TRUE),
				'price' => $this->input->post('price', TRUE),
				'modified_at' => $now->format('Y-m-d H:i:s'),
			);

		if (!$this->item->edit($this->input->post('carId', TRUE), $data)) {
			$data ='';
			$data['error'] = 'item não existe ou não pertence a este user';
			redirect(site_url().'/dashboard/cars/'.$this->input->post('carId', TRUE).'item/'.$this->input->post('id', TRUE));
		}
		
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		redirect(site_url().'/dashboard/cars/'.$this->input->post('carId', TRUE));
	}

	public function delete() {
		//echo 'delete the item with id: '.$id;
		$data ['name'] = ($this->item->delete($this->input->post('carId', TRUE), $this->input->post('id', TRUE))) ? 'deleted success' : 'deleted error';
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

}