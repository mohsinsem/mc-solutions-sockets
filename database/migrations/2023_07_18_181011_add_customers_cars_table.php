<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers_cars', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('CustomerId');
            $table->integer('CarId');
            $table->integer('CarOptionId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers_cars', function (Blueprint $table) {
            //
        });
    }
};
