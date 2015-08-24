<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula',10);
            $table->string('nomealuno',100);
            $table->date('datanascimento')->nullable();
            $table->string('sexo',1)->nullable();
            $table->integer('turma_id')->unsigned()->nullable();
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('SET NULL');
            $table->string('codcurso',5)->nullable();
            $table->string('turma',1)->nullable();
            $table->integer('numero')->nullable();
            $table->string('endereco',255)->nullable();
            $table->string('bairro',100)->nullable();
            $table->string('cep',15)->nullable();
            $table->string('municipio',50)->nullable();
            $table->string('nomemae',100)->nullable();
            $table->string('nomepai',100)->nullable();
            $table->string('senha',50)->nullable();
            $table->string('telefone',250)->nullable();
            $table->string('telefonemae',250)->nullable();
            $table->string('telefonepai',250)->nullable();
            $table->string('emailmae',150)->nullable();
            $table->string('emailpai',150)->nullable();
            $table->string('emailcontratante',150)->nullable();
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
        Schema::drop('alunos');
    }
}
