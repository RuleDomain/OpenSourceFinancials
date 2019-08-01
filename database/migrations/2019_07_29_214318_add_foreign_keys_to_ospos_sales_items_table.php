<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSalesItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_items', function(Blueprint $table)
		{
			$table->foreign('item_id', 'ospos_sales_items_ibfk_1')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sale_id', 'ospos_sales_items_ibfk_2')->references('sale_id')->on('ospos_sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('item_location', 'ospos_sales_items_ibfk_3')->references('location_id')->on('ospos_stock_locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_items', function(Blueprint $table)
		{
			$table->dropForeign('ospos_sales_items_ibfk_1');
			$table->dropForeign('ospos_sales_items_ibfk_2');
			$table->dropForeign('ospos_sales_items_ibfk_3');
		});
	}

}
