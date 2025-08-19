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
        Schema::create('sms_files', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->text('message')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('count')->nullable();
            $table->string('cost')->default(0);
            $table->enum('status', ['delivered', 'pending', 'failed'])->default('pending');
            $table->boolean('block')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_files');
    }
};
