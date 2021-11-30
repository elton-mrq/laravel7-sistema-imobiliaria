<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_permissao', function (Blueprint $table) {
            $table->integer('perfil_id')->unsigned();
           $table->integer('permissao_id')->unsigned();

           $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade');
           $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');

           $table->primary(['perfil_id', 'permissao_id']);

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
        Schema::dropIfExists('perfil_permissao');
    }
}
