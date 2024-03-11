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
    {// [Title,Year,Runtime,Genre(s),Synopsis,Poster URL:,Director(s),Cast,Writer(s),Ratings,Trailer URL,
    // Release Date,Production Company,Awards,Streaming Availability]
        Schema::create('movies_api', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('year');
            $table->integer('runtime');
            $table->json('genre');
            $table->string('synopsis');
            $table->string('poster_url');
            $table->string('director');
            $table->string('casts');
            $table->string('writers');
            $table->string('ratings');
            $table->string('trailer_url');
            $table->string('release_date');
            $table->string('product_company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_api');
    }
};
