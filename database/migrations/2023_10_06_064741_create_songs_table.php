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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('introduce')->nullable();
            $table->text('situation')->nullable();
            $table->text('online_link')->nullable();
            $table->integer('view')->default(0);
            $table->text('year_create')->nullable();
            $table->text('slug')->nullable();
            $table->text('lyrics')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
