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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->integer('prestamo_id')->autoIncrement();
            $table->string('isbn');
            $table->integer('usuario');
            $table->integer('ejemplar');
            $table->timestamp('fecha_prestamo')->useCurrent();
            $table->timestamp('fecha_devolucion')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_modificacion')->useCurrent()->useCurrentOnUpdate()->nullable();

            $table->foreign('usuario')->references('usuario_id')->on('usuarios');
            $table->foreign('ejemplar')->references('ejemplar_id')->on('ejemplares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
