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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('color_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('energy_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('image')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->unsignedTinyInteger('owners_number')->default(1);
            $table->unsignedTinyInteger('doors_number')->default(4);
            $table->unsignedTinyInteger('places_number')->default(5);
            $table->unsignedDecimal('width', 8 , 2)->nullable();
            $table->unsignedDecimal('length', 8 , 2)->nullable();
            $table->unsignedDecimal('height', 8 , 2)->nullable();
            $table->unsignedDecimal('co2_emission', 8 , 2);
            $table->string('trunk_volume')->nullable();
            $table->unsignedTinyInteger('fiscal_horsepower')->nullable();
            $table->unsignedInteger('power')->nullable();
            $table->string('euro_standars')->nullable();
            $table->unsignedTinyInteger('consumption')->nullable();
            $table->unsignedTinyInteger('air_quality_certificate')->nullable();
            $table->string('guarantee')->nullable();
            $table->string('origin')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('upholstery')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('technical_control')->nullable();
            $table->enum('gearbox', ['automatic', 'manual'])->default('manual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
