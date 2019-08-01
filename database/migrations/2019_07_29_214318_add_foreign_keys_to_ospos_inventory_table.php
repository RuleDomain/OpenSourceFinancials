<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('inventory', function(Blueprint $table)
		{
			$table->foreign('trans_items', 'ospos_inventory_ibfk_1')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trans_user', 'ospos_inventory_ibfk_2')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trans_location', 'ospos_inventory_ibfk_3')->references('location_id')->on('ospos_stock_locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('inventory', function(Blueprint $table)
		{
			$table->dropForeign('ospos_inventory_ibfk_1');
			$table->dropForeign('ospos_inventory_ibfk_2');
			$table->dropForeign('ospos_inventory_ibfk_3');
		});
	}

}
