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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama makanan/minuman
            $table->text('description')->nullable(); // Deskripsi menu
            $table->decimal('price', 10, 2); // Harga
            $table->string('category'); // Kategori (makanan, minuman, dll.)
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};