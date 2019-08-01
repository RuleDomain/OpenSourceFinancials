<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemKitItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_kit_items', function(Blueprint $table)
		{
			$table->integer('item_kit_id');
			$table->integer('item_id')->index('ospos_item_kit_items_ibfk_2');
			$table->decimal('quantity', 15, 3);
			$table->integer('kit_sequence')->default(0);
			$table->primary(['item_kit_id','item_id','quantity']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_kit_items');
	}

}
