<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genre_id');
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->boolean('multijugador');
            $table->string('pegi', 2); // Cambiado a string por el valor "!"

            $table->timestamps();

            // Clave foránea
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        });

        // Agregar la restricción CHECK manualmente usando DB::statement
        DB::statement('ALTER TABLE games ADD CONSTRAINT pegi_check CHECK (pegi IN ("3", "7", "12", "16", "18", "!"))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};

