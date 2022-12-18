<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDineinOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinein_order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dinein_order_id');
            $table->foreignId('item_id');
            $table->timestamps();
        });

        Schema::table('dinein_order_item', function($table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('dinein_order_id')->references('id')->on('dinein_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dinein_order_item');
    }
}
