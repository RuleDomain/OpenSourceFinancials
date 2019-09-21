<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersPackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('customers_packages')) { return; }
		Schema::create('customers_packages', function(Blueprint $table)
		{
			$table->integer('package_id', true);
			$table->string('package_name')->nullable();
			$table->float('points_percent', 10, 0)->default(0);
			$table->integer('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers_packages');
	}

}
