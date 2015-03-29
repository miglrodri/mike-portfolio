<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Edit_items_table_int_float extends CI_Migration {

	public function up() {
		$fields = array(
        	'liters' => array(
                'type' => 'FLOAT',
        	),
        	'price' => array(
                'type' => 'FLOAT',
        	),
		);
		
		$this->dbforge->modify_column('items', $fields);
		
		echo '<p>#005 Edited items table!</p>';
	}

	public function down() {
		$fields = array(
        	'liters' => array(
                'type' => 'INT',
        	),
        	'price' => array(
                'type' => 'INT',
        	),
		);
		
		$this->dbforge->modify_column('items', $fields);

		echo '<p>#005 Reverse edition on items table!</p>';
	}

}