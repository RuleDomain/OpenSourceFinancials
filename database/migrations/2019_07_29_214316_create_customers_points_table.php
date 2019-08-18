<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('customers_points')) { return; }
		Schema::create('customers_points', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('person_id')->index('person_id');
			$table->integer('package_id')->index('package_id');
			$table->integer('sale_id')->index('sale_id');
			$table->integer('points_earned');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers_points');
	}

}
