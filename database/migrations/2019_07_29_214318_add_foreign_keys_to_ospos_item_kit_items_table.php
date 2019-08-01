<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposItemKitItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_kit_items', function(Blueprint $table)
		{
			$table->foreign('item_kit_id', 'ospos_item_kit_items_ibfk_1')->references('item_kit_id')->on('ospos_item_kits')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('item_id', 'ospos_item_kit_items_ibfk_2')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_kit_items', function(Blueprint $table)
		{
			$table->dropForeign('ospos_item_kit_items_ibfk_1');
			$table->dropForeign('ospos_item_kit_items_ibfk_2');
		});
	}

}
