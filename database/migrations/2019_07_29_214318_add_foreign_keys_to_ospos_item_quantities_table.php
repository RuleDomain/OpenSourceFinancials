<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposItemQuantitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_quantities', function(Blueprint $table)
		{
			$table->foreign('item_id', 'ospos_item_quantities_ibfk_1')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('location_id', 'ospos_item_quantities_ibfk_2')->references('location_id')->on('ospos_stock_locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_quantities', function(Blueprint $table)
		{
			$table->dropForeign('ospos_item_quantities_ibfk_1');
			$table->dropForeign('ospos_item_quantities_ibfk_2');
		});
	}

}
