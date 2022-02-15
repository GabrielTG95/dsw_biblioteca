<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('usuario_id')->autoIncrement();
            $table->string('nombre');
            $table->string('email')->onupdate('cascade');
            $table->string('password');
            $table->tinyInteger('rol');//0=superuser,1=administrador,2=estudiante
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_modificacion')->useCurrent()->useCurrentOnUpdate()->nullable();

            $table->foreign('rol')->references('rol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
