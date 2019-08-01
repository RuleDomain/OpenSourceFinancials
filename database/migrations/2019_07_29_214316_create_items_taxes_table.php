<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items_taxes', function(Blueprint $table)
		{
			$table->integer('item_id');
			$table->string('name');
			$table->decimal('percent', 15, 3);
			$table->primary(['item_id','name','percent']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items_taxes');
	}

}
