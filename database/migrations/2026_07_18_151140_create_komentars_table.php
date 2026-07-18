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


            // user yang komentar
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();


            // artikel tujuan komentar
            $table->foreignId('artikel_id')
                ->constrained()
                ->cascadeOnDelete();


            // balasan komentar
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('komentars')
                ->cascadeOnDelete();


            // isi komentar
            $table->text('isi');


            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
