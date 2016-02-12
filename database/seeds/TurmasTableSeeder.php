<?php

use Illuminate\Database\Seeder;

class TurmasTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		\DB::table('turmas')->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
		\DB::table('turmas')->insert(array (
			0 => 
			array (
				'id' => 1,
				'serie_id' => 1,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:52:43',
				'updated_at' => '2016-02-11 17:52:43',
			),
			1 => 
			array (
				'id' => 2,
				'serie_id' => 1,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:52:43',
				'updated_at' => '2016-02-11 17:52:43',
			),
			2 => 
			array (
				'id' => 3,
				'serie_id' => 2,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:53:31',
				'updated_at' => '2016-02-11 17:53:31',
			),
			3 => 
			array (
				'id' => 4,
				'serie_id' => 2,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:53:31',
				'updated_at' => '2016-02-11 17:53:31',
			),
			4 => 
			array (
				'id' => 5,
				'serie_id' => 2,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:53:31',
				'updated_at' => '2016-02-11 17:53:31',
			),
			5 => 
			array (
				'id' => 6,
				'serie_id' => 4,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:54:02',
				'updated_at' => '2016-02-11 17:54:02',
			),
			6 => 
			array (
				'id' => 7,
				'serie_id' => 4,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:54:02',
				'updated_at' => '2016-02-11 17:54:02',
			),
			7 => 
			array (
				'id' => 8,
				'serie_id' => 4,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:54:02',
				'updated_at' => '2016-02-11 17:54:02',
			),
			8 => 
			array (
				'id' => 9,
				'serie_id' => 5,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:54:36',
				'updated_at' => '2016-02-11 17:54:36',
			),
			9 => 
			array (
				'id' => 10,
				'serie_id' => 5,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:54:36',
				'updated_at' => '2016-02-11 17:54:36',
			),
			10 => 
			array (
				'id' => 11,
				'serie_id' => 5,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:54:36',
				'updated_at' => '2016-02-11 17:54:36',
			),
			11 => 
			array (
				'id' => 12,
				'serie_id' => 5,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:54:36',
				'updated_at' => '2016-02-11 17:54:36',
			),
			12 => 
			array (
				'id' => 13,
				'serie_id' => 8,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:55:12',
				'updated_at' => '2016-02-11 17:55:12',
			),
			13 => 
			array (
				'id' => 14,
				'serie_id' => 8,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:55:12',
				'updated_at' => '2016-02-11 17:55:12',
			),
			14 => 
			array (
				'id' => 15,
				'serie_id' => 8,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:55:12',
				'updated_at' => '2016-02-11 17:55:12',
			),
			15 => 
			array (
				'id' => 16,
				'serie_id' => 8,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:55:12',
				'updated_at' => '2016-02-11 17:55:12',
			),
			16 => 
			array (
				'id' => 17,
				'serie_id' => 8,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:55:12',
				'updated_at' => '2016-02-11 17:55:12',
			),
			17 => 
			array (
				'id' => 18,
				'serie_id' => 9,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:55:43',
				'updated_at' => '2016-02-11 17:55:43',
			),
			18 => 
			array (
				'id' => 19,
				'serie_id' => 9,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:55:43',
				'updated_at' => '2016-02-11 17:55:43',
			),
			19 => 
			array (
				'id' => 20,
				'serie_id' => 9,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:55:43',
				'updated_at' => '2016-02-11 17:55:43',
			),
			20 => 
			array (
				'id' => 21,
				'serie_id' => 9,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:55:43',
				'updated_at' => '2016-02-11 17:55:43',
			),
			21 => 
			array (
				'id' => 22,
				'serie_id' => 9,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:55:43',
				'updated_at' => '2016-02-11 17:55:43',
			),
			22 => 
			array (
				'id' => 23,
				'serie_id' => 10,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:56:17',
				'updated_at' => '2016-02-11 17:56:17',
			),
			23 => 
			array (
				'id' => 24,
				'serie_id' => 10,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:56:17',
				'updated_at' => '2016-02-11 17:56:17',
			),
			24 => 
			array (
				'id' => 25,
				'serie_id' => 10,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:56:17',
				'updated_at' => '2016-02-11 17:56:17',
			),
			25 => 
			array (
				'id' => 26,
				'serie_id' => 10,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:56:17',
				'updated_at' => '2016-02-11 17:56:17',
			),
			26 => 
			array (
				'id' => 27,
				'serie_id' => 10,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:56:17',
				'updated_at' => '2016-02-11 17:56:17',
			),
			27 => 
			array (
				'id' => 28,
				'serie_id' => 11,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:56:42',
				'updated_at' => '2016-02-11 17:56:42',
			),
			28 => 
			array (
				'id' => 29,
				'serie_id' => 11,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:56:42',
				'updated_at' => '2016-02-11 17:56:42',
			),
			29 => 
			array (
				'id' => 30,
				'serie_id' => 11,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:56:42',
				'updated_at' => '2016-02-11 17:56:42',
			),
			30 => 
			array (
				'id' => 31,
				'serie_id' => 11,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:56:42',
				'updated_at' => '2016-02-11 17:56:42',
			),
			31 => 
			array (
				'id' => 32,
				'serie_id' => 11,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:56:42',
				'updated_at' => '2016-02-11 17:56:42',
			),
			32 => 
			array (
				'id' => 33,
				'serie_id' => 12,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:57:19',
				'updated_at' => '2016-02-11 17:57:19',
			),
			33 => 
			array (
				'id' => 34,
				'serie_id' => 12,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:57:19',
				'updated_at' => '2016-02-11 17:57:19',
			),
			34 => 
			array (
				'id' => 35,
				'serie_id' => 12,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:57:19',
				'updated_at' => '2016-02-11 17:57:19',
			),
			35 => 
			array (
				'id' => 36,
				'serie_id' => 12,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:57:19',
				'updated_at' => '2016-02-11 17:57:19',
			),
			36 => 
			array (
				'id' => 37,
				'serie_id' => 13,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:57:52',
				'updated_at' => '2016-02-11 17:57:52',
			),
			37 => 
			array (
				'id' => 38,
				'serie_id' => 13,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:57:52',
				'updated_at' => '2016-02-11 17:57:52',
			),
			38 => 
			array (
				'id' => 39,
				'serie_id' => 13,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:57:52',
				'updated_at' => '2016-02-11 17:57:52',
			),
			39 => 
			array (
				'id' => 40,
				'serie_id' => 13,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:57:52',
				'updated_at' => '2016-02-11 17:57:52',
			),
			40 => 
			array (
				'id' => 41,
				'serie_id' => 13,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:57:52',
				'updated_at' => '2016-02-11 17:57:52',
			),
			41 => 
			array (
				'id' => 42,
				'serie_id' => 14,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:58:47',
				'updated_at' => '2016-02-11 17:58:47',
			),
			42 => 
			array (
				'id' => 43,
				'serie_id' => 14,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:58:47',
				'updated_at' => '2016-02-11 17:58:47',
			),
			43 => 
			array (
				'id' => 44,
				'serie_id' => 14,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:58:47',
				'updated_at' => '2016-02-11 17:58:47',
			),
			44 => 
			array (
				'id' => 45,
				'serie_id' => 14,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:58:47',
				'updated_at' => '2016-02-11 17:58:47',
			),
			45 => 
			array (
				'id' => 46,
				'serie_id' => 14,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:58:47',
				'updated_at' => '2016-02-11 17:58:48',
			),
			46 => 
			array (
				'id' => 47,
				'serie_id' => 15,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:59:25',
				'updated_at' => '2016-02-11 17:59:25',
			),
			47 => 
			array (
				'id' => 48,
				'serie_id' => 15,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:59:25',
				'updated_at' => '2016-02-11 17:59:25',
			),
			48 => 
			array (
				'id' => 49,
				'serie_id' => 15,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:59:25',
				'updated_at' => '2016-02-11 17:59:25',
			),
			49 => 
			array (
				'id' => 50,
				'serie_id' => 15,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:59:25',
				'updated_at' => '2016-02-11 17:59:25',
			),
			50 => 
			array (
				'id' => 51,
				'serie_id' => 15,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:59:25',
				'updated_at' => '2016-02-11 17:59:25',
			),
			51 => 
			array (
				'id' => 52,
				'serie_id' => 16,
				'letra' => 'A',
				'created_at' => '2016-02-11 17:59:52',
				'updated_at' => '2016-02-11 17:59:52',
			),
			52 => 
			array (
				'id' => 53,
				'serie_id' => 16,
				'letra' => 'B',
				'created_at' => '2016-02-11 17:59:52',
				'updated_at' => '2016-02-11 17:59:52',
			),
			53 => 
			array (
				'id' => 54,
				'serie_id' => 16,
				'letra' => 'C',
				'created_at' => '2016-02-11 17:59:52',
				'updated_at' => '2016-02-11 17:59:52',
			),
			54 => 
			array (
				'id' => 55,
				'serie_id' => 16,
				'letra' => 'D',
				'created_at' => '2016-02-11 17:59:52',
				'updated_at' => '2016-02-11 17:59:52',
			),
			55 => 
			array (
				'id' => 56,
				'serie_id' => 16,
				'letra' => 'E',
				'created_at' => '2016-02-11 17:59:52',
				'updated_at' => '2016-02-11 17:59:52',
			),
			56 => 
			array (
				'id' => 57,
				'serie_id' => 17,
				'letra' => 'A',
				'created_at' => '2016-02-11 18:00:30',
				'updated_at' => '2016-02-11 18:00:30',
			),
			57 => 
			array (
				'id' => 58,
				'serie_id' => 17,
				'letra' => 'B',
				'created_at' => '2016-02-11 18:00:30',
				'updated_at' => '2016-02-11 18:00:30',
			),
			58 => 
			array (
				'id' => 59,
				'serie_id' => 17,
				'letra' => 'C',
				'created_at' => '2016-02-11 18:00:30',
				'updated_at' => '2016-02-11 18:00:30',
			),
			59 => 
			array (
				'id' => 60,
				'serie_id' => 17,
				'letra' => 'D',
				'created_at' => '2016-02-11 18:00:30',
				'updated_at' => '2016-02-11 18:00:30',
			),
			60 => 
			array (
				'id' => 61,
				'serie_id' => 17,
				'letra' => 'E',
				'created_at' => '2016-02-11 18:00:30',
				'updated_at' => '2016-02-11 18:00:30',
			),
			61 => 
			array (
				'id' => 62,
				'serie_id' => 18,
				'letra' => 'A',
				'created_at' => '2016-02-11 18:01:05',
				'updated_at' => '2016-02-11 18:01:05',
			),
			62 => 
			array (
				'id' => 63,
				'serie_id' => 18,
				'letra' => 'B',
				'created_at' => '2016-02-11 18:01:05',
				'updated_at' => '2016-02-11 18:01:05',
			),
			63 => 
			array (
				'id' => 64,
				'serie_id' => 18,
				'letra' => 'C',
				'created_at' => '2016-02-11 18:01:05',
				'updated_at' => '2016-02-11 18:01:05',
			),
			64 => 
			array (
				'id' => 65,
				'serie_id' => 18,
				'letra' => 'D',
				'created_at' => '2016-02-11 18:01:05',
				'updated_at' => '2016-02-11 18:01:05',
			),
			65 => 
			array (
				'id' => 66,
				'serie_id' => 18,
				'letra' => 'E',
				'created_at' => '2016-02-11 18:01:05',
				'updated_at' => '2016-02-11 18:01:05',
			),
			66 => 
			array (
				'id' => 67,
				'serie_id' => 19,
				'letra' => 'A',
				'created_at' => '2016-02-11 18:01:32',
				'updated_at' => '2016-02-11 18:01:32',
			),
			67 => 
			array (
				'id' => 68,
				'serie_id' => 19,
				'letra' => 'B',
				'created_at' => '2016-02-11 18:01:32',
				'updated_at' => '2016-02-11 18:01:32',
			),
			68 => 
			array (
				'id' => 69,
				'serie_id' => 19,
				'letra' => 'C',
				'created_at' => '2016-02-11 18:01:32',
				'updated_at' => '2016-02-11 18:01:32',
			),
			69 => 
			array (
				'id' => 70,
				'serie_id' => 19,
				'letra' => 'D',
				'created_at' => '2016-02-11 18:01:32',
				'updated_at' => '2016-02-11 18:01:32',
			),
		));
	}

}
