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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('yt_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('spotify_link')->nullable();
            $table->string('zing_mp3_link')->nullable();
            $table->text('story')->nullable();
            $table->string('prize')->nullable();
            $table->string('featured_song')->nullable();
            $table->string('instrumental_music')->nullable();
            $table->string('achievement')->nullable();
            $table->string('poem')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
