<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_items_table extends CI_Migration {

	public function up() {
		$this->dbforge->add_field('id');
		
		$fields = array(
			'date' => array(
				'type' => 'DATETIME',
				),
			'kilometers' => array(
				'type' => 'INT',
				),
			'liters' => array(
				'type' => 'INT',
				),
			'price' => array(
				'type' => 'INT',
				),
			'carId' => array(
				'type' => 'INT',
				),
		);
		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field('created_at DATETIME NOT NULL');
		$this->dbforge->add_field('modified_at DATETIME NOT NULL');
		
		$this->dbforge->create_table('items');
		echo '<p>#004 Created items table!</p>';
	}

	public function down() {
		$this->dbforge->drop_table('items');
		echo '<p>#004 Deleted items table!</p>';
	}
}