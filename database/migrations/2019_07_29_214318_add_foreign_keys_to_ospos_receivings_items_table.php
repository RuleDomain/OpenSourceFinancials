<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposReceivingsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receivings_items', function(Blueprint $table)
		{
			$table->foreign('item_id', 'ospos_receivings_items_ibfk_1')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('receiving_id', 'ospos_receivings_items_ibfk_2')->references('receiving_id')->on('ospos_receivings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receivings_items', function(Blueprint $table)
		{
			$table->dropForeign('ospos_receivings_items_ibfk_1');
			$table->dropForeign('ospos_receivings_items_ibfk_2');
		});
	}

}
