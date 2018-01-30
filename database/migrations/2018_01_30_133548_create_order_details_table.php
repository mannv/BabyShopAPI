<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrderDetailsTable.
 */
class CreateOrderDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('amount');
            $table->timestamps();
//            $table->foreign('product_id', 'fk_product_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
//            $table->foreign('order_id', 'fk_order_id')->references('id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_details');
	}
}
