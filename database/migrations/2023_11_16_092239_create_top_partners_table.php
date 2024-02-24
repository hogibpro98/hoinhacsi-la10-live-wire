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
        Schema::create('top_partners', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence')->nullable();
            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_partners');
    }
};