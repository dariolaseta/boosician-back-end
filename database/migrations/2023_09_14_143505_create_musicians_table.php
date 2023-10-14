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
        Schema::create('musicians', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('birth_date')->nullable();
            $table->string('address',70);
            $table->string('num_phone',50);
            $table->text('image');
            $table->text('bio');
            $table->string('surname');
            $table->text('cv')->nullable();
            $table->float('price',6,2);
            $table->string('musical_genre');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicians');
    }
};
