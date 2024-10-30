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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('major_id');
            $table->date('date');
            $table->time('time_comes')->nullable();
            $table->time('time_leaves')->nullable();
            $table->enum('status', ['hadir', 'alpa', 'izin', 'terlambat'])->default('hadir');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('level_id')->references('id')->on('levels')->cascadeOnDelete();
            $table->foreign('major_id')->references('id')->on('majors')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
