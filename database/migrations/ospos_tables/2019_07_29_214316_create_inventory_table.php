<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('inventory')) { return; }
		Schema::create('inventory', function(Blueprint $table)
		{
			$table->integer('trans_id', true);
			$table->integer('trans_items')->default(0)->index('trans_items');
			$table->integer('trans_user')->default(0)->index('trans_user');
			$table->timestamp('trans_date')->default(DB::raw('CURRENT_TIMESTAMP'))->index('trans_date');
			$table->text('trans_comment', 65535);
			$table->integer('trans_location')->index('trans_location');
			$table->decimal('trans_inventory', 15, 3)->default(0.000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inventory');
	}

}
