<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('systems_words', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('translation');
            $table->dateTime('next_repetition_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('systems_words');
    }
};
