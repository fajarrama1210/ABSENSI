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
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('nisn')->nullable();
                $table->string('photo')->nullable();
                $table->unsignedBigInteger('level_id')->nullable();
                $table->unsignedBigInteger('major_id')->nullable();

                $table->foreign('level_id')->references('id')->on('levels')->cascadeOnDelete()->cascadeOnUpdate();
                $table->foreign('major_id')->references('id')->on('majors')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('status')->default('not active');
                $table->rememberToken();
                $table->timestamps();
            });

            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
