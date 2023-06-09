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
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idProduct')->nullable();
            $table->foreign('idProduct')
                ->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('idUser')->nullable();
            $table->foreign('idUser')
                ->references('id')->on('users')->onDelete('cascade');
            $table->integer('estrellas')->nullable();
            $table->text('resenia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoraciones');
    }
};
