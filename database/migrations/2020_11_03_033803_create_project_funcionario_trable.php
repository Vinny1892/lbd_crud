<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFuncionarioTrable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto_funcionario', function (Blueprint $table) {
            $table->id();
            $table->integer("id_funcionario");
            $table->integer("id_projeto");
            $table->foreign('id_funcionario')->references('id')->on('funcionario');
            $table->foreign('id_projeto')->references('id')->on('projeto');
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
        Schema::dropIfExists('project_funcionario_trable');
    }
}
