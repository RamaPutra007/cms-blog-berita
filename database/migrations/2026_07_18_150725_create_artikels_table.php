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



            // siapa pembuat artikel
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();



            // kategori artikel
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->cascadeOnDelete();



            $table->string('judul');


            $table->string('slug')
                ->unique();



            $table->string('gambar')
                ->nullable();



            $table->longText('isi');



            $table->enum('status', [

                'draft',
                'publish'

            ])
                ->default('draft');



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
