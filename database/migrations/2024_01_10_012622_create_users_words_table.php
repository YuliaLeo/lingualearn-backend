<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_words', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('translation');
            $table->integer('correct_count')->default(0);
            $table->integer('incorrect_count')->default(0);
            $table->dateTime('next_show_at ')->nullable();
            $table->boolean('is_archived ')->default(false);
            $table->unsignedBigInteger('folder_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_words');
    }
};
