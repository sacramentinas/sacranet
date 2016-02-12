<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('usuarios')->delete();
        
		\DB::table('usuarios')->insert(array (
			0 => 
			array (
				'id' => 1,
				'nome' => 'Thiago Miranda',
				'login' => 'thiago',
				'senha' => 'c9d2dd84f01d0ebf3d02198e88904cdcb36d1fab',
				'tipo' => 'admin',
				'remember_token' => 'GMETZyLPUTqdHeb0r0v3USc6NgaPQMlYoLUxe8z3xYxPEMXmlAt1peCk1ZQn',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2016-02-11 19:24:04',
			),
			1 => 
			array (
				'id' => 2,
				'nome' => 'Neide Xavier',
				'login' => 'neide',
				'senha' => 'b06abc978621a33ac249f6e185ba48ffc6ee4aa5',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:14:29',
				'updated_at' => '2016-02-11 19:14:29',
			),
			2 => 
			array (
				'id' => 3,
				'nome' => 'Ir. Luzia',
				'login' => 'irluzia',
				'senha' => '7eda492a999de186c24c878cd81cee309afb0acf',
				'tipo' => 'mestre',
				'remember_token' => '0fFUnQvwv2fzoAl8kC3GzlUmEkT8CO7AN2u6VzbjZBR6NxYsP6Us6Y5XT09M',
				'created_at' => '2016-02-11 19:15:19',
				'updated_at' => '2016-02-12 09:21:12',
			),
			3 => 
			array (
				'id' => 4,
				'nome' => 'Tatiana Lopes',
				'login' => 'tati',
				'senha' => '9ae0d58495f21909e01ce8d1e28c50a578e9735e',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:16:07',
				'updated_at' => '2016-02-11 19:16:07',
			),
			4 => 
			array (
				'id' => 5,
				'nome' => 'Samara Santos',
				'login' => 'samara',
				'senha' => '8ed4a9695ee89e2da14e728167b56a5c6cda27b3',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:16:58',
				'updated_at' => '2016-02-11 19:16:58',
			),
			5 => 
			array (
				'id' => 6,
				'nome' => 'Ir. Eunice',
				'login' => 'ireunice',
				'senha' => '35d714cde96f8da315e463799a86c89d1dd80418',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:17:39',
				'updated_at' => '2016-02-11 19:17:39',
			),
			6 => 
			array (
				'id' => 7,
				'nome' => 'Ir. Vilma',
				'login' => 'irvilma',
				'senha' => 'a6e872c7a712301a8e15dab31158c8f9f2cd7166',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:19:01',
				'updated_at' => '2016-02-11 19:19:01',
			),
			7 => 
			array (
				'id' => 8,
				'nome' => 'Eliane Lima',
				'login' => 'eliane',
				'senha' => '1700c73d0cd495abbc7a20da82a79e86feea1185',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:20:42',
				'updated_at' => '2016-02-11 19:20:42',
			),
			8 => 
			array (
				'id' => 9,
				'nome' => 'Sandra Porto',
				'login' => 'sandra',
				'senha' => '2e91a30623ee537b5d82b1ef73d3be983642eaae',
				'tipo' => 'mestre',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:22:28',
				'updated_at' => '2016-02-11 19:22:28',
			),
			9 => 
			array (
				'id' => 10,
				'nome' => 'Admin',
				'login' => 'admin',
				'senha' => '4b8294341ede8b03ab78c71d8afc872155146e48',
				'tipo' => 'admin',
				'remember_token' => NULL,
				'created_at' => '2016-02-11 19:23:09',
				'updated_at' => '2016-02-11 19:23:09',
			),
		));
	}

}
