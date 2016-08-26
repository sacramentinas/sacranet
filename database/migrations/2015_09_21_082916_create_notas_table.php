<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aluno_id')->nullable();
            $table->integer('disciplina_id')->unsigned()->nullable();
            $table->float('nota1unidade')->nullable();
            $table->float('nota2unidade')->nullable();
            $table->float('nota3unidade')->nullable();
            $table->timestamps();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notas');
    }
}
