<?php

use Illuminate\Database\Seeder;

class DisciplinasTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('disciplinas')->delete();
        
		\DB::table('disciplinas')->insert(array (
			0 => 
			array (
				'id' => 1,
				'descricao' => 'Redação',
				'nome_sei' => 'REDACAO',
				'created_at' => '2015-09-21 08:12:03',
				'updated_at' => '2015-09-21 08:12:03',
			),
			1 => 
			array (
				'id' => 2,
				'descricao' => 'Inglês',
				'nome_sei' => 'INGLES',
				'created_at' => '2015-09-21 08:12:42',
				'updated_at' => '2015-09-21 08:12:42',
			),
			2 => 
			array (
				'id' => 3,
				'descricao' => 'História',
				'nome_sei' => 'HISTORIA',
				'created_at' => '2015-09-21 08:12:49',
				'updated_at' => '2015-09-21 08:12:49',
			),
			3 => 
			array (
				'id' => 4,
				'descricao' => 'Geografia',
				'nome_sei' => 'GEOGRAFIA',
				'created_at' => '2015-09-21 08:12:59',
				'updated_at' => '2015-09-21 08:12:59',
			),
			4 => 
			array (
				'id' => 5,
				'descricao' => 'Matemática',
				'nome_sei' => 'MATEMATICA',
				'created_at' => '2015-09-21 08:13:09',
				'updated_at' => '2015-09-21 08:13:09',
			),
			5 => 
			array (
				'id' => 6,
				'descricao' => 'Ensino Religioso',
				'nome_sei' => 'ENS. RELIGIOSO',
				'created_at' => '2015-09-21 08:13:20',
				'updated_at' => '2015-09-21 08:13:20',
			),
			6 => 
			array (
				'id' => 7,
				'descricao' => 'Língua Portuguesa',
				'nome_sei' => 'LING. PORTUGUESA',
				'created_at' => '2015-09-21 08:14:04',
				'updated_at' => '2015-09-21 08:14:04',
			),
			7 => 
			array (
				'id' => 8,
				'descricao' => 'Educação Física',
				'nome_sei' => 'EDUCACAO FISICA',
				'created_at' => '2015-09-21 08:14:19',
				'updated_at' => '2015-09-21 08:14:19',
			),
			8 => 
			array (
				'id' => 9,
				'descricao' => 'Espanhol',
				'nome_sei' => 'ESPANHOL',
				'created_at' => '2015-09-21 08:14:28',
				'updated_at' => '2015-09-21 08:14:28',
			),
			9 => 
			array (
				'id' => 10,
				'descricao' => 'Arte',
				'nome_sei' => 'ARTE',
				'created_at' => '2015-09-21 08:15:05',
				'updated_at' => '2015-09-21 08:25:23',
			),
			10 => 
			array (
				'id' => 11,
				'descricao' => 'Física',
				'nome_sei' => 'FISICA',
				'created_at' => '2015-09-21 08:15:19',
				'updated_at' => '2015-09-21 08:15:19',
			),
			11 => 
			array (
				'id' => 12,
				'descricao' => 'Química',
				'nome_sei' => 'QUIMICA',
				'created_at' => '2015-09-21 08:15:28',
				'updated_at' => '2015-09-21 08:15:28',
			),
			12 => 
			array (
				'id' => 13,
				'descricao' => 'Filosofia',
				'nome_sei' => 'FILOSOFIA',
				'created_at' => '2015-09-21 08:15:37',
				'updated_at' => '2015-09-21 08:15:37',
			),
			13 => 
			array (
				'id' => 14,
				'descricao' => 'Biologia',
				'nome_sei' => 'BIOLOGIA',
				'created_at' => '2015-09-21 08:15:45',
				'updated_at' => '2015-09-21 08:15:45',
			),
			14 => 
			array (
				'id' => 15,
				'descricao' => 'Sociologia',
				'nome_sei' => 'SOCIOLOGIA',
				'created_at' => '2015-09-21 08:15:55',
				'updated_at' => '2015-09-21 08:15:55',
			),
			15 => 
			array (
				'id' => 16,
				'descricao' => 'Literatura Brasileira',
				'nome_sei' => 'LIT. BRASILEIRA',
				'created_at' => '2015-09-21 08:16:12',
				'updated_at' => '2015-09-21 08:16:12',
			),
			16 => 
			array (
				'id' => 17,
				'descricao' => 'Xadrez',
				'nome_sei' => 'XADREZ',
				'created_at' => '2015-09-21 08:17:13',
				'updated_at' => '2015-09-21 08:17:13',
			),
			17 => 
			array (
				'id' => 18,
				'descricao' => 'Geometria',
				'nome_sei' => 'GEOMETRIA',
				'created_at' => '2015-09-21 08:18:35',
				'updated_at' => '2015-09-21 08:18:35',
			),
            18 =>
                array (
                    'id' => 18,
                    'descricao' => 'Espanhol/Inglês',
                    'nome_sei' => 'ESPANHOL/INGLES',
                    'created_at' => '2015-09-21 08:18:35',
                    'updated_at' => '2015-09-21 08:18:35',
                ),



		));
	}

}
