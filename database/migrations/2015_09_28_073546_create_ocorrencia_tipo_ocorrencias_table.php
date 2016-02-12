<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaTipoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_tipo_ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ocorrencia_id')->nullable();
            $table->unsignedInteger('tipo_ocorrencia_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipo_ocorrencia_id')->references('id')->on('tipo_ocorrencias')->onDelete('set null');
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
        Schema::drop('ocorrencia_tipo_ocorrencias');
    }
}
