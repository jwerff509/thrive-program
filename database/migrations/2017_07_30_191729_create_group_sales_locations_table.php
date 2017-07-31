<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSalesLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_sales_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_details_id')->unsigned()->default(0);
            $table->foreign('group_details_id')->references('id')->on('group_details')->onDelete('cascade');
            $table->string('sales_location')->default('');
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
        Schema::table('group_sales_locations', function (Blueprint $table) {
            Schema::drop('group_sales_locations');
        });
    }
}
