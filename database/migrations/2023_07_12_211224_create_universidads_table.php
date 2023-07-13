<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('universidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('email');
            $table->date('fecha');
            $table->string('telefono');
            $table->integer('cant_salones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universidads');
    }
};
