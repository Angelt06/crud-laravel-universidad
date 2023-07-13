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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('universidad_id');
            $table->enum('categoria', ['estandar', 'auditorio', 'videoconferencia']);
            $table->enum('tipo', ['sencillo', 'amoblado', 'mediano', 'grande']);
            $table->timestamps();


            $table->foreign('universidad_id')->references('id')->on('universidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons');
    }
};
