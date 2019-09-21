<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('sales_items')) { return; }
		Schema::create('sales_items', function(Blueprint $table)
		{
			$table->integer('sale_id')->default(0)->index('sale_id');
			$table->integer('item_id')->default(0)->index('item_id');
			$table->string('description')->nullable();
			$table->string('serialnumber', 30)->nullable();
			$table->integer('line')->default(0);
			$table->decimal('quantity_purchased', 15, 3)->default(0.000);
			$table->decimal('item_cost_price', 15);
			$table->decimal('item_unit_price', 15);
			$table->decimal('discount', 15)->default(0.00);
			$table->boolean('discount_type')->default(0);
			$table->integer('item_location')->index('item_location');
			$table->boolean('print_option')->default(0);
			$table->primary(['sale_id','item_id','line']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_items');
	}

}
