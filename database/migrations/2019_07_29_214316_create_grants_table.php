<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grants', function(Blueprint $table)
		{
			$table->string('permission_id');
			$table->integer('person_id')->index('ospos_grants_ibfk_2');
			$table->string('menu_group', 32)->nullable()->default('home');
			$table->primary(['permission_id','person_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grants');
	}

}
