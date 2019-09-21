<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('employees')) { return; }
		Schema::create('employees', function(Blueprint $table)
		{
			$table->string('username')->unique('username');
			$table->string('password');
			$table->integer('person_id')->index('person_id');
			$table->integer('deleted')->default(0);
			$table->integer('hash_version')->default(2);
			$table->string('language', 48)->nullable();
			$table->string('language_code', 8)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
