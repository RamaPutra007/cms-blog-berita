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
        Schema::create('artikels', function (Blueprint $table) {

            $table->id();

            // Penulis artikel
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Kategori artikel
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->cascadeOnDelete();

            // Judul artikel
            $table->string('judul');

            // URL artikel
            $table->string('slug')->unique();

            // Gambar artikel
            $table->string('gambar')->nullable();

            // Isi artikel
            $table->longText('isi');

            // Status artikel
            $table->enum('status', [
                'draft',
                'publish',
            ])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
