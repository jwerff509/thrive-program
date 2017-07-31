<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->default(0);
            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
            $table->integer('report_term')->unsigned()->default(0);
            $table->string('report_term_description')->default('');
            $table->integer('year')->unsigned()->default(0);
            $table->boolean('savings_group')->default(false);
            $table->decimal('account_balance', 6, 2)->default(0.00);
            $table->boolean('producers_group')->default(false);
            $table->string('value_chain')->defualt('');
            $table->string('value_chain_unit')->default('');
            $table->decimal('sales_price', 6, 2)->default(0.00);
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
        Schema::table('group_details', function (Blueprint $table) {
            Schema::drop('group_details');
        });
    }
}
