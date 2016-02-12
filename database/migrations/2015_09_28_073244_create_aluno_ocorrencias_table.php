<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ocorrencia_id')->nullable();
            $table->unsignedInteger('aluno_id')->nullable();
            $table->integer('matricula');
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('set null');
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencias')->onDelete('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aluno_ocorrencias');
    }
}
