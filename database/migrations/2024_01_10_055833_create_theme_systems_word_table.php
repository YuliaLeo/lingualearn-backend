<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theme_systems_word', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('systems_word_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_systems_word');
    }
};
