<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id')->nullable();
            $table->unsignedInteger('tipo_ocorrencia_id')->nullable();
            $table->unsignedInteger('disciplina_id')->nullable();
            $table->integer('unidade');
            $table->integer('matricula');
            $table->text('descricao');
            $table->timestamp('publicado_em');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ocorrencias');
    }
}
