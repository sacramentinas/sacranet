<?php

use Illuminate\Database\Seeder;

class TipoOcorrenciasTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tipo_ocorrencias')->delete();
        
		\DB::table('tipo_ocorrencias')->insert(array (
			0 => 
			array (
				'id' => 1,
			'descricao' => 'Chegou atrasado(a) para início da aula',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-18 10:13:52',
				'updated_at' => '2015-09-19 09:43:06',
			),
			1 => 
			array (
				'id' => 3,
				'descricao' => 'Não apresentou as atividades solicitadas',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-18 11:16:19',
				'updated_at' => '2015-09-18 11:16:19',
			),
			2 => 
			array (
				'id' => 4,
				'descricao' => 'Não fez as atividades propostas em sala de aula',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:06:28',
				'updated_at' => '2015-09-19 08:06:28',
			),
			3 => 
			array (
				'id' => 5,
				'descricao' => 'Não trouxe o material escolar solicitado',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:06:45',
				'updated_at' => '2015-09-19 08:06:45',
			),
			4 => 
			array (
				'id' => 6,
				'descricao' => 'Mantêm conversas paralelas',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:07:02',
				'updated_at' => '2015-09-19 08:07:02',
			),
			5 => 
			array (
				'id' => 7,
				'descricao' => 'Recusou-se a participar das aulas de Ed. Física sem apresentar justificativa cabível',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:07:27',
				'updated_at' => '2015-09-19 08:07:27',
			),
			6 => 
			array (
				'id' => 8,
				'descricao' => 'Realizou atividades de outra disciplina durante a aula',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:07:44',
				'updated_at' => '2015-09-19 08:07:44',
			),
			7 => 
			array (
				'id' => 9,
				'descricao' => 'Está mais responsável',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-19 08:07:56',
				'updated_at' => '2015-09-19 08:07:56',
			),
			8 => 
			array (
				'id' => 10,
				'descricao' => 'O aluno se destacou com a sua participação',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-19 08:08:08',
				'updated_at' => '2015-09-19 08:08:08',
			),
			9 => 
			array (
				'id' => 11,
				'descricao' => 'Ausente',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:08:24',
				'updated_at' => '2015-09-19 08:08:24',
			),
			10 => 
			array (
				'id' => 12,
				'descricao' => 'Bom rendimento na avaliação realizada',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-19 08:08:37',
				'updated_at' => '2015-09-19 08:08:37',
			),
			11 => 
			array (
				'id' => 13,
				'descricao' => 'Baixo rendimento na avaliação realizada',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:08:53',
				'updated_at' => '2015-09-19 08:08:53',
			),
			12 => 
			array (
				'id' => 14,
				'descricao' => 'Com dificuldade no conteúdo trabalhado',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:09:10',
				'updated_at' => '2015-09-19 08:09:10',
			),
			13 => 
			array (
				'id' => 15,
				'descricao' => 'Parabéns pelo comprometimento',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-19 08:09:28',
				'updated_at' => '2015-09-19 08:09:28',
			),
			14 => 
			array (
				'id' => 16,
				'descricao' => 'Ótima postura da turma',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-19 08:09:47',
				'updated_at' => '2015-09-19 08:09:47',
			),
			15 => 
			array (
				'id' => 17,
				'descricao' => 'Utilizando Celular em sala',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-19 08:09:59',
				'updated_at' => '2015-09-19 08:09:59',
			),
			16 => 
			array (
				'id' => 21,
				'descricao' => 'Atividade Incompleta',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-21 07:36:40',
				'updated_at' => '2015-09-21 07:36:40',
			),
			17 => 
			array (
				'id' => 22,
				'descricao' => 'Postura inadequada durante a realização da aula/atividade',
				'tipo' => 'Negativa',
				'created_at' => '2015-09-21 07:37:06',
				'updated_at' => '2015-09-21 07:37:06',
			),
			18 => 
			array (
				'id' => 23,
				'descricao' => 'Boa postura em sala de aula',
				'tipo' => 'Positiva',
				'created_at' => '2015-09-21 07:38:25',
				'updated_at' => '2015-09-21 07:38:25',
			),
		));
	}

}
