<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_order_id');
            $table->foreignId('item_id');
            $table->timestamps();
        });

        Schema::table('delivery_order_item', function($table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('delivery_order_id')->references('id')->on('delivery_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_order_item');
    }
}
