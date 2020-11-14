<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFkConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario',function (Blueprint $table){
            $table->foreign('id_setor')->references('id')->on('setor')->onDelete('cascade')->onUpdate('cascade');
        });

        /*Schema::table('departamento',function (Blueprint $table){
            $table->foreign('id_funcionario_gerente')->references('id')->on('funcionario')->onDelete('cascade')->onUpdate('cascade');
        });*/

        Schema::table('setor',function (Blueprint $table){
            $table->foreign('id_departamento')->references('id')->on('departamento')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('dependente',function (Blueprint $table){
            $table->foreign('id_funcionario')->references('id')->on('funcionario')->onDelete('cascade')->onUpdate('cascade');
        });
    }

}
