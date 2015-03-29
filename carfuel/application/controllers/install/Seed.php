<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To run this on CLI
 * http://stevethomas.com.au/php/database-seeding-in-codeigniter.html
 * see php version: php -v
 * $ php index.php seed index
 */

class Seed extends CI_Controller {
	function __construct(){
		parent::__construct();

		// can only be called from the command line
		if (!is_cli()) {
			//redirect(base_url());
		}
 
		// can only be run in the development environment
		if (ENVIRONMENT !== 'development') {
			//exit('Wowsers! You don\'t want to do that!');
		}
 
		// initiate faker
		$this->faker = Faker\Factory::create();
 
		// load any required models
		$this->load->model('user');
		$this->load->model('car');
		$this->load->model('item');
	}
 
	/**
	* seed local database
	*/
	function index() {

		$this->output->enable_profiler(TRUE);

		// migrate the database to the last version!
		$this->load->library('migration');
		$this->migration->latest();

		$number_of_users = 10;

		echo 'seeding: STARTING\n';
		echo PHP_EOL;

		// purge existing data
		$this->_truncate_db();
		echo 'seeding: DELETED TABLES\n';
		echo PHP_EOL;

		// seed users
		$this->_seed_users($number_of_users);
		$this->_seed_cars($number_of_users);
		$this->_seed_items($number_of_users);
 
		echo 'seeding: DONE\n';
		echo PHP_EOL;

		//redirect(base_url().'install/schema/users');
	}
 
	/**
	* seed users
	*
	* @param int $limit
	*/
	function _seed_users($limit) {
		echo "seeding: $limit USERS";
		// create a bunch of base user accounts
		for ($i = 0; $i < $limit; $i++) {
			echo ".";
			$now = new DateTime();
			if ($i == 0) {
				$data = array(
					'name' => 'Miguel Jesus',
					'email' => 'miguel.jesus@tangivel.com',
					'hashed_pass' => sha1('1234567'),
					'created_at' => $now->format('Y-m-d H:i:s'),
					'modified_at' => $now->format('Y-m-d H:i:s'),
				);
			}
			else {
				$data = array(
					'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
					'email' => $this->faker->email,
					'hashed_pass' => sha1('1234567'),
					'created_at' => $now->format('Y-m-d H:i:s'),
					'modified_at' => $now->format('Y-m-d H:i:s'),
				);	
			}

			$this->user->insert($data);
		}

		echo PHP_EOL;
	}

	/**
	* seed cars
	*
	* @param int $limit
	*/
	function _seed_cars($limit) {
		echo "seeding: $limit CARS";
		// create a bunch of base car accounts
		for ($i = 0; $i < $limit; $i++) {
			echo ".";
			$now = new DateTime();
			if ($i == 0) {
				$data = array(
					'name' => 'Volkswagen Golf 2 1300 - 1990',
					'userId' => ($i+1),
					'created_at' => $now->format('Y-m-d H:i:s'),
					'modified_at' => $now->format('Y-m-d H:i:s'),
				);
			}
			else {
				$data = array(
					'name' => 'Dodge ' . $this->faker->lastName,
					'userId' => ($i+1),
					'created_at' => $now->format('Y-m-d H:i:s'),
					'modified_at' => $now->format('Y-m-d H:i:s'),
				);	
			}

			$this->car->insert($data);
		}

		echo PHP_EOL;
	}

	/**
	* seed items
	*
	* @param int $limit
	*/
	function _seed_items($limit) {
		echo "seeding: $limit ITEMS";
		// create a bunch of base items
		for ($i = 0; $i < $limit; $i++) {
			echo ".";
			$now = new DateTime();

			$data = array(
				'date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
				'kilometers' => ($this->faker->randomDigitNotNull * 100),
				'liters' => ($this->faker->randomDigitNotNull * 10),
				'price' => ($this->faker->randomDigitNotNull * 10),
				'carId' => ($i+1),
				'created_at' => $now->format('Y-m-d H:i:s'),
				'modified_at' => $now->format('Y-m-d H:i:s'),
			);

			$this->item->insert($data);
		}

		echo PHP_EOL;
	}
	
	private function _truncate_db()
	{
		$this->user->truncate();
		$this->car->truncate();
		$this->item->truncate();
	}

}