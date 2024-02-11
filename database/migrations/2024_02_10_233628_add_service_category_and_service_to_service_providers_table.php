<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceCategoryAndServiceToServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->unsignedBigInteger('service_category_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();

            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('set null');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_providers', function (Blueprint $table) {
            $table->dropForeign(['service_category_id']);
            $table->dropForeign(['service_id']);
            $table->dropColumn(['service_category_id', 'service_id']);
        });
    }
}
