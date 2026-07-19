<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentars', function (Blueprint $table) {

            $table->id();

            $table->foreignId('artikel_id')
                ->constrained()
                ->cascadeOnDelete();

            // komentar utama / balasan
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('komentars')
                ->cascadeOnDelete();

            $table->string('nama');

            $table->string('email');

            $table->text('isi');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
