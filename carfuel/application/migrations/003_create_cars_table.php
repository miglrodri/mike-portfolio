<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cars_table extends CI_Migration {

	public function up() {
		$this->dbforge->add_field('id');
		
		$fields = array(
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'userId' => array(
				'type' => 'INT',
				),
		);
		
		$this->dbforge->add_field($fields);
		$this->dbforge->add_field('created_at DATETIME NOT NULL');
		$this->dbforge->add_field('modified_at DATETIME NOT NULL');
		
		$this->dbforge->create_table('cars');
		echo '<p>#003 Created cars table!</p>';
	}

	public function down() {
		$this->dbforge->drop_table('cars');
		echo '<p>#003 Deleted cars table!</p>';
	}
}