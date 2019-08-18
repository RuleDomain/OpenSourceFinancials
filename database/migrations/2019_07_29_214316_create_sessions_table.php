<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('sessions')) { return; }
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->string('id', 40);
			$table->string('ip_address', 45);
			$table->integer('timestamp')->unsigned()->default(0)->index('ci_sessions_timestamp');
			$table->binary('data', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sessions');
	}

}
