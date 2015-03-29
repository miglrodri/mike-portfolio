<?php

class Car extends CI_Model {

	public function getAll($userId) {
		// only user cars
		$this->db->select()->from('cars');
		$this->db->where(array('cars.userId' =>$userId));
		//$this->db->join('users', 'users.id = cars.userId');
		$query = $this->db->get()->result_array();

		if ($query) {
			$query = $this->_calculate($query);
		}

		return $query;
	}

	public function get($userId, $id) {
		// get user cars with this id
		$where = array(
			'id'=>$id,
			'userId'=>$userId,
		);
		$this->db->select()->from('cars')->where($where);
		$query = $this->db->get()->result_array();
		
		if ($query) {
			$query = $this->_calculate($query);
		}

		return $query;
	}

	public function insert($data) {
		// insert the car in the database, related to user
		$this->db->insert('cars', $data);
		return $this->db->insert_id();
	}

	public function edit($userId, $data) {
		// edit this user car with new info
		if ($this->get($userId, $data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('cars', $data);
			return $data;
		}
		return false;
	}

	public function delete($userId, $id) {
		// delete this user car
		if ($this->get($userId, $id)) {
			$this->db->where('id', $id);
			$this->db->delete('cars');
			return true;
		}
		return false;
	}

	public function getName($userId, $id) {
		// get car name with $id
		$where = array(
			'id'=>$id,
			'userId'=>$userId,
		);
		$this->db->select('name')->from('cars')->where($where);
		$query = $this->db->get()->result_array();
		
		if ($query) {
			return $query[0]['name'];
		}

		return false;
	}

	public function truncate() {
		$this->db->truncate('cars');
	}

	private function _calculate($cars_array) {

		$this->load->model('item');

		foreach ($cars_array as $key => $car) {
			// init
			$sum_liters = 0;
			$sum_price = 0;

			$items = $this->item->getAll($car['id']);

//			var_dump($items);
			$cars_array[$key]['items'] = $items;

			$first_km = 0;
			$first_liters = 0;
			$last_km = 0;
			$i = 0;

			$nr_items = count($items);
			foreach ($items as $item_key => $item) {
				$sum_liters += $item['liters'];
				$sum_price +=$item['price'];
				if ($i+1 == $nr_items) {
					$last_km = $item['kilometers'];
				}
				if ($i == 0){
					$first_km = $item['kilometers'];
					$first_liters = $item['liters'];
				}
				$i++;
			}

			// - Consumo médio 
			// (total litros * 100) / ultima km - km 0
			// --------------

			$cars_array[$key]['fuel_consumption'] = ($nr_items > 1) ? (($sum_liters-$first_liters)*100)/($last_km - $first_km) : -1;

			$cars_array[$key]['total_kilometers'] = ($nr_items > 1) ? ($last_km - $first_km) : 0;
			$cars_array[$key]['total_liters'] = $sum_liters;
			$cars_array[$key]['total_price'] = $sum_price;

		}
		return $cars_array;
	}

}