<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakeawayOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takeaway_order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('takeaway_order_id');
            $table->foreignId('item_id');
            $table->timestamps();
        });

        Schema::table('takeaway_order_item', function($table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('takeaway_order_id')->references('id')->on('takeaway_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('takeaway_order_item');
    }
}
