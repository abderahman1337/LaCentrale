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
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->nullable()->constrained()->cascadeOnDelete();
            $table->ipAddress('ip_address')->nullable();
            $table->unsignedInteger('refresh_count')->default(0);
            $table->string('user_agent')->nullable();
            $table->string('user_browser')->nullable();
            $table->string('user_device')->nullable();
            $table->string('user_os')->nullable();
            $table->string('user_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
