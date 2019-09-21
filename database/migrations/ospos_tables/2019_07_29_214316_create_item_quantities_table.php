<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemQuantitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('item_quantities')) { return; }
		Schema::create('item_quantities', function(Blueprint $table)
		{
			$table->integer('item_id')->index('item_id');
			$table->integer('location_id')->index('location_id');
			$table->decimal('quantity', 15, 3)->default(0.000);
			$table->primary(['item_id','location_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_quantities');
	}

}
