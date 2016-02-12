<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		\DB::table('series')->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
		\DB::table('series')->insert(array (
			0 => 
			array (
				'id' => 1,
				'cod_sei' => 'MM',
				'nome' => 'Grupo 2',
				'created_at' => '2015-09-03 14:09:00',
				'updated_at' => '2015-09-03 14:09:00',
			),
			1 => 
			array (
				'id' => 2,
				'cod_sei' => 'EM',
				'nome' => 'Grupo 3',
				'created_at' => '2015-09-03 14:08:47',
				'updated_at' => '2015-09-03 14:08:47',
			),
			2 => 
			array (
				'id' => 4,
				'cod_sei' => 'E1',
				'nome' => 'Grupo 4',
				'created_at' => '2015-09-03 14:08:13',
				'updated_at' => '2015-09-03 14:08:13',
			),
			3 => 
			array (
				'id' => 5,
				'cod_sei' => 'E2',
				'nome' => 'Grupo 5',
				'created_at' => '2015-09-03 14:08:29',
				'updated_at' => '2015-09-03 14:08:29',
			),
			4 => 
			array (
				'id' => 8,
				'cod_sei' => 'F1',
				'nome' => '1º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:09:26',
				'updated_at' => '2015-09-03 14:09:26',
			),
			5 => 
			array (
				'id' => 9,
				'cod_sei' => 'F2',
				'nome' => '2º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:09:58',
				'updated_at' => '2015-09-03 14:09:58',
			),
			6 => 
			array (
				'id' => 10,
				'cod_sei' => 'F3',
				'nome' => '3º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:10:18',
				'updated_at' => '2015-09-03 14:10:18',
			),
			7 => 
			array (
				'id' => 11,
				'cod_sei' => 'F4',
				'nome' => '4º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:12:36',
				'updated_at' => '2015-09-03 14:12:36',
			),
			8 => 
			array (
				'id' => 12,
				'cod_sei' => 'F5',
				'nome' => '5º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:13:01',
				'updated_at' => '2015-09-03 14:13:01',
			),
			9 => 
			array (
				'id' => 13,
				'cod_sei' => 'F6',
				'nome' => '6º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:13:30',
				'updated_at' => '2015-09-03 14:13:30',
			),
			10 => 
			array (
				'id' => 14,
				'cod_sei' => 'F7',
				'nome' => '7º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:14:01',
				'updated_at' => '2015-09-03 14:14:01',
			),
			11 => 
			array (
				'id' => 15,
				'cod_sei' => 'F8',
				'nome' => '8º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 14:14:20',
				'updated_at' => '2016-02-11 17:59:25',
			),
			12 => 
			array (
				'id' => 16,
				'cod_sei' => 'G8',
				'nome' => '8ª Série',
				'created_at' => '2015-09-03 14:17:00',
				'updated_at' => '2015-09-03 14:17:00',
			),
			13 => 
			array (
				'id' => 17,
				'cod_sei' => '1A',
				'nome' => '1ª Série do Ensino Médio',
				'created_at' => '2015-09-03 14:17:30',
				'updated_at' => '2015-09-03 14:17:30',
			),
			14 => 
			array (
				'id' => 18,
				'cod_sei' => '2A',
				'nome' => '2ª Série do Ensino Médio',
				'created_at' => '2015-09-03 14:17:50',
				'updated_at' => '2015-09-03 14:17:50',
			),
			15 => 
			array (
				'id' => 19,
				'cod_sei' => '3A',
				'nome' => '3ª Série do Ensino Médio',
				'created_at' => '2015-09-03 14:18:15',
				'updated_at' => '2015-09-03 14:18:15',
			),
		));
	}

}
