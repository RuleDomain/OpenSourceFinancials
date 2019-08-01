<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposItemsTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items_taxes', function(Blueprint $table)
		{
			$table->foreign('item_id', 'ospos_items_taxes_ibfk_1')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items_taxes', function(Blueprint $table)
		{
			$table->dropForeign('ospos_items_taxes_ibfk_1');
		});
	}

}
