<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'funcionario',
            function (Blueprint $table) {
                $table->id();
                $table->string("nome");
                $table->string("cpf");
                $table->string("endereco");
                $table->integer("id_setor")->nullable();
                $table->timestamps();
            }
        );

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
