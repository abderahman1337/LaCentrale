<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_limits', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('ip_address')->index();
            $table->string('user_source')->nullable();
            $table->string('user_agent')->nullable()->index();
            $table->string('user_browser')->nullable()->index();
            $table->string('user_device')->nullable()->index();
            $table->string('user_os')->nullable()->index();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();  
            $table->string('region_name')->nullable();  
            $table->string('region_code')->nullable();  
            $table->string('city_name')->nullable();  
            $table->string('zip_code')->nullable();  
            $table->timestamps();
        });
        Schema::table('rate_limits', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_limits');
    }
}
