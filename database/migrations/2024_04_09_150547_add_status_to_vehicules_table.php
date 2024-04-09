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
        Schema::table('vehicules', function (Blueprint $table) {
            $table->string('status')->default('available');
            $table->boolean('first_owner')->default(1);
            $table->unsignedTinyInteger('previous_owners')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            //
        });
    }
};
