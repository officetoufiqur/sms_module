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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->boolean('role')->default(0);
            $table->string('otp')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('kyc_verified')->default(0);
            $table->string('company_name')->nullable();
            $table->string('company_number')->nullable();
            $table->string('company_type')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile_otp')->nullable();
            $table->boolean('mobile_is_verified')->default(0);
            $table->string('file_type')->nullable();
            $table->string('file')->nullable();
            $table->string('musking')->default('1');
            $table->string('non_musking')->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
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
