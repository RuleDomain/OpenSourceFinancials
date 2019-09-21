<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceivingsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('receivings_items')) { return; }
		Schema::create('receivings_items', function(Blueprint $table)
		{
			$table->integer('receiving_id')->default(0);
			$table->integer('item_id')->default(0)->index('item_id');
			$table->string('description', 30)->nullable();
			$table->string('serialnumber', 30)->nullable();
			$table->integer('line');
			$table->decimal('quantity_purchased', 15, 3)->default(0.000);
			$table->decimal('item_cost_price', 15);
			$table->decimal('item_unit_price', 15);
			$table->decimal('discount', 15)->default(0.00);
			$table->boolean('discount_type')->default(0);
			$table->integer('item_location');
			$table->decimal('receiving_quantity', 15, 3)->default(1.000);
			$table->primary(['receiving_id','item_id','line']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receivings_items');
	}

}
