<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDinnerTablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dinner_tables', function(Blueprint $table)
		{
			$table->integer('dinner_table_id', true);
			$table->string('name', 30);
			$table->boolean('status')->default(0);
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
		Schema::drop('dinner_tables');
	}

}
