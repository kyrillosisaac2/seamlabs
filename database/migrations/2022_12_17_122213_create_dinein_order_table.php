<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDineinOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinein_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id');
            $table->integer('service_charge');
            $table->string('waiter_name');
            $table->timestamps();
        });

        Schema::table('dinein_orders', function($table) {
            $table->foreign('table_id')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dinein_orders');
    }
}
