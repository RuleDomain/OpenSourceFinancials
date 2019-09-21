<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemKitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('item_kits')) { return; }
		Schema::create('item_kits', function(Blueprint $table)
		{
			$table->integer('item_kit_id', true);
			$table->string('name');
			$table->integer('item_id')->default(0);
			$table->decimal('kit_discount', 15)->default(0.00);
			$table->boolean('kit_discount_type')->default(0);
			$table->boolean('price_option')->default(0);
			$table->boolean('print_option')->default(0);
			$table->string('description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_kits');
	}

}
