<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesItemsTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_items_taxes', function(Blueprint $table)
		{
			$table->integer('sale_id')->index('sale_id');
			$table->integer('item_id')->index('item_id');
			$table->integer('line')->default(0);
			$table->string('name');
			$table->decimal('percent', 15, 4)->default(0.0000);
			$table->boolean('tax_type')->default(0);
			$table->boolean('rounding_code')->default(0);
			$table->boolean('cascade_sequence')->default(0);
			$table->decimal('item_tax_amount', 15, 4)->default(0.0000);
			$table->integer('sales_tax_code_id')->nullable();
			$table->integer('jurisdiction_id')->nullable();
			$table->integer('tax_category_id')->nullable();
			$table->primary(['sale_id','item_id','line','name','percent']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_items_taxes');
	}

}
