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
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('image')->nullable();

            $table->string('card_title_1')->nullable();
            $table->string('card_title_2')->nullable();
            $table->string('card_title_3')->nullable();
            $table->string('card_title_4')->nullable();

            $table->text('card_subtitle_1')->nullable();
            $table->text('card_subtitle_2')->nullable();
            $table->text('card_subtitle_3')->nullable();
            $table->text('card_subtitle_4')->nullable();

            $table->longText('description')->nullable();
            $table->text('question')->nullable();
            $table->longText('answer')->nullable();

            $table->string('gmail')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_m_s');
    }
};
