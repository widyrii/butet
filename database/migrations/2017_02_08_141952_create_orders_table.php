<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('code_order');
            $table->string('code_shipping');
            $table->string('code');
            $table->string('code_cake');
            $table->string('name');
            $table->string('desc');
            $table->string('image');
            $table->string('price');
            $table->string('status');
            $table->string('evidence');
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);
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
        Schema::dropIfExists('orders');
    }
}
