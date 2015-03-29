<?php

class Item extends CI_Model {

	public function getAll($carId) {
		// only car items
		$this->db->select()->from('items');
		$this->db->where(array('items.carId' =>$carId));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get($carId, $id) {
		// get car items with this id
		$where = array(
			'id'=>$id,
			'carId'=>$carId,
		);
		$this->db->select()->from('items')->where($where);
		$query = $this->db->get();
		
		if ($result = $query->first_row('array')) {
			return $result;
		}
		return false;
	}

	public function insert($data) {
		// insert the item in the database, related to car
		$this->db->insert('items', $data);
		return $this->db->insert_id();
	}

	public function edit($carId, $data) {
		// edit this car item with new info
		if ($this->get($carId, $data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('items', $data);
			return $data;
		}
		return false;
	}

	public function delete($carId, $id) {
		// delete this car item
		if ($this->get($carId, $id)) {
			$this->db->where('id', $id);
			$this->db->delete('items');
			return true;
		}
		return false;
	}

	public function truncate() {
		$this->db->truncate('items');
	}

}