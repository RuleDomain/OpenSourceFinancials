<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposAttributeLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attribute_links', function(Blueprint $table)
		{
			$table->foreign('definition_id', 'ospos_attribute_links_ibfk_1')->references('definition_id')->on('ospos_attribute_definitions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('attribute_id', 'ospos_attribute_links_ibfk_2')->references('attribute_id')->on('ospos_attribute_values')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('item_id', 'ospos_attribute_links_ibfk_3')->references('item_id')->on('ospos_items')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('receiving_id', 'ospos_attribute_links_ibfk_4')->references('receiving_id')->on('ospos_receivings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sale_id', 'ospos_attribute_links_ibfk_5')->references('sale_id')->on('ospos_sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('attribute_links', function(Blueprint $table)
		{
			$table->dropForeign('ospos_attribute_links_ibfk_1');
			$table->dropForeign('ospos_attribute_links_ibfk_2');
			$table->dropForeign('ospos_attribute_links_ibfk_3');
			$table->dropForeign('ospos_attribute_links_ibfk_4');
			$table->dropForeign('ospos_attribute_links_ibfk_5');
		});
	}

}
