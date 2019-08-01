<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSalesItemsTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_items_taxes', function(Blueprint $table)
		{
			$table->foreign('sale_id', 'ospos_sales_items_taxes_ibfk_1')->references('sale_id')->on('ospos_sales_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('item_id', 'ospos_sales_items_taxes_ibfk_2')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_items_taxes', function(Blueprint $table)
		{
			$table->dropForeign('ospos_sales_items_taxes_ibfk_1');
			$table->dropForeign('ospos_sales_items_taxes_ibfk_2');
		});
	}

}
