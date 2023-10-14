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
        Schema::create('musical_instrument_musician', function (Blueprint $table) {
            $table->unsignedBigInteger("musical_instrument_id");
            $table->foreign("musical_instrument_id")->references("id")->on("musical_instruments")->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger("musician_id");
            $table->foreign("musician_id")->references("user_id")->on("musicians")->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['musical_instrument_id', 'musician_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musical_instrument_musician');
    }
};
