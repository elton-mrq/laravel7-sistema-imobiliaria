<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
        Schema::create('perfil_permissao', function (Blueprint $table) {
           $table->integer('perfil_id')->unsigned();
           $table->foreign('perfil_id')->references('id')->on('perfis')->onDelete('cascade');
           $table->integer('permissao_id')->unsigned();
           $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
           $table->primary(['perfil_id', 'permissao_id']);
        });
        Schema::create('perfil_user', function (Blueprint $table) {
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')->references('id')->on('perfis')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->primary(['perfil_id', 'user_id']);
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis');
        Schema::dropIfExists('perfil_permissao');
        Schema::dropIfExists('perfil_user');
    }
}
