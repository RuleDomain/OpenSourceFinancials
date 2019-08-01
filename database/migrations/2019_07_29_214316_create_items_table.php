<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->string('name');
			$table->string('category');
			$table->integer('supplier_id')->nullable()->index('supplier_id');
			$table->string('item_number')->nullable()->index('item_number');
			$table->string('description');
			$table->decimal('cost_price', 15);
			$table->decimal('unit_price', 15);
			$table->decimal('reorder_level', 15, 3)->default(0.000);
			$table->decimal('receiving_quantity', 15, 3)->default(1.000);
			$table->integer('item_id', true);
			$table->string('pic_filename')->nullable();
			$table->boolean('allow_alt_description');
			$table->boolean('is_serialized');
			$table->boolean('stock_type')->default(0);
			$table->boolean('item_type')->default(0);
			$table->integer('deleted')->default(0);
			$table->integer('tax_category_id')->nullable();
			$table->decimal('qty_per_pack', 15, 3)->default(1.000);
			$table->string('pack_name', 8)->nullable()->default('Each');
			$table->integer('low_sell_item_id')->nullable()->default(0);
			$table->string('hsn_code', 32)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
