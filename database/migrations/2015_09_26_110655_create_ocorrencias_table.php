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
            $table->unsignedInteger('disciplina_id')->nullable();
            $table->unsignedInteger('turma_id')->nullable();
            $table->integer('unidade');
            $table->text('descricao');
            $table->timestamp('data');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
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
