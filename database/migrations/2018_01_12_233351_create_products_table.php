<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->integer('cate_id')->unsigned();
			$table->tinyInteger('flash_sale')->default(0);
			$table->tinyInteger('feature')->default(0);
			$table->integer('old_price')->default(0);
			$table->integer('price')->default(0);
			$table->integer('sold')->default(0);
			$table->longText('description');
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('cate_id', 'fk_category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
