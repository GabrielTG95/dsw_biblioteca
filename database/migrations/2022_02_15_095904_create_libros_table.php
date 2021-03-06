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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('titulo');
            $table->string('autor');
            $table->tinyInteger('categoria');
            $table->string('editorial');
            $table->tinyInteger('edicion');
            $table->year('fecha_publicacion');
            $table->string('portada')->nullable();
            $table->boolean('disponible')->default(0);
            $table->string('link')->nullable();
            $table->text('sinopsis')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
};
