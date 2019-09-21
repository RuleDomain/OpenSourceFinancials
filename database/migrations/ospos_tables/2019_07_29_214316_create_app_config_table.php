<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('app_config')) { return; }
		Schema::create('app_config', function(Blueprint $table)
		{
			$table->string('key', 50)->primary();
			$table->string('value', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_config');
	}

}
