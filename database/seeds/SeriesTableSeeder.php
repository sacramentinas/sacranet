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
        \DB::table('turmas')->delete();
        \DB::table('series')->delete();
        
		\DB::table('series')->insert(array (
			0 => 
			array (
				'id' => 4,
				'cod_sei' => 'E1',
				'nome' => 'Grupo 4',
				'created_at' => '2015-09-03 11:08:13',
				'updated_at' => '2015-09-03 11:08:13',
			),
			1 => 
			array (
				'id' => 5,
				'cod_sei' => 'E2',
				'nome' => 'Grupo 5',
				'created_at' => '2015-09-03 11:08:29',
				'updated_at' => '2015-09-03 11:08:29',
			),
			2 => 
			array (
				'id' => 6,
				'cod_sei' => 'EM',
				'nome' => 'Grupo 3',
				'created_at' => '2015-09-03 11:08:47',
				'updated_at' => '2015-09-03 11:08:47',
			),
			3 => 
			array (
				'id' => 7,
				'cod_sei' => 'MM',
				'nome' => 'Grupo 2',
				'created_at' => '2015-09-03 11:09:00',
				'updated_at' => '2015-09-03 11:09:00',
			),
			4 => 
			array (
				'id' => 8,
				'cod_sei' => 'F1',
				'nome' => '1º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:09:26',
				'updated_at' => '2015-09-03 11:09:26',
			),
			5 => 
			array (
				'id' => 9,
				'cod_sei' => 'F2',
				'nome' => '2º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:09:58',
				'updated_at' => '2015-09-03 11:09:58',
			),
			6 => 
			array (
				'id' => 10,
				'cod_sei' => 'F3',
				'nome' => '3º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:10:18',
				'updated_at' => '2015-09-03 11:10:18',
			),
			7 => 
			array (
				'id' => 11,
				'cod_sei' => 'F4',
				'nome' => '4º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:12:36',
				'updated_at' => '2015-09-03 11:12:36',
			),
			8 => 
			array (
				'id' => 12,
				'cod_sei' => 'F5',
				'nome' => '5º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:13:01',
				'updated_at' => '2015-09-03 11:13:01',
			),
			9 => 
			array (
				'id' => 13,
				'cod_sei' => 'F6',
				'nome' => '6º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:13:30',
				'updated_at' => '2015-09-03 11:13:30',
			),
			10 => 
			array (
				'id' => 14,
				'cod_sei' => 'F7',
				'nome' => '7º Ano do Ensino Fundamental',
				'created_at' => '2015-09-03 11:14:01',
				'updated_at' => '2015-09-03 11:14:01',
			),
			11 => 
			array (
				'id' => 15,
				'cod_sei' => 'G7',
				'nome' => '7ª Série',
				'created_at' => '2015-09-03 11:14:20',
				'updated_at' => '2015-09-03 11:14:20',
			),
			12 => 
			array (
				'id' => 16,
				'cod_sei' => 'G8',
				'nome' => '8ª Série',
				'created_at' => '2015-09-03 11:17:00',
				'updated_at' => '2015-09-03 11:17:00',
			),
			13 => 
			array (
				'id' => 17,
				'cod_sei' => '1A',
				'nome' => '1ª Série do Ensino Médio',
				'created_at' => '2015-09-03 11:17:30',
				'updated_at' => '2015-09-03 11:17:30',
			),
			14 => 
			array (
				'id' => 18,
				'cod_sei' => '2A',
				'nome' => '2ª Série do Ensino Médio',
				'created_at' => '2015-09-03 11:17:50',
				'updated_at' => '2015-09-03 11:17:50',
			),
			15 => 
			array (
				'id' => 19,
				'cod_sei' => '3A',
				'nome' => '3ª Série do Ensino Médio',
				'created_at' => '2015-09-03 11:18:15',
				'updated_at' => '2015-09-03 11:18:15',
			),
		));
	}

}
