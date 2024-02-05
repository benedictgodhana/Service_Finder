<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('county_id')->constrained('counties');
            $table->foreignId('subcounty_id')->constrained('subcounties');
            $table->foreignId('ward_id')->constrained('wards');
            $table->foreignId('area_id')->constrained('areas');
            $table->string('contact_information')->nullable();
            $table->string('profile_pic')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('qualifications')->nullable();
            $table->string('specializations')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_description')->nullable();
            $table->string('website')->nullable();
            $table->string('services_offered')->nullable();
            // ... (other fields)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_providers');
    }
}