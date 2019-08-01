<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_links', function(Blueprint $table)
		{
			$table->integer('attribute_id')->nullable()->index('attribute_id');
			$table->integer('definition_id')->index('definition_id');
			$table->integer('item_id')->nullable()->index('item_id');
			$table->integer('sale_id')->nullable()->index('sale_id');
			$table->integer('receiving_id')->nullable()->index('receiving_id');
			$table->unique(['attribute_id','definition_id','item_id','sale_id','receiving_id'], 'attribute_links_uq1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attribute_links');
	}

}
