<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('suppliers')) { return; }
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->integer('person_id')->index('person_id');
			$table->string('company_name');
			$table->string('agency_name');
			$table->string('account_number')->nullable()->unique('account_number');
			$table->string('tax_id', 32)->default('');
			$table->integer('deleted')->default(0);
			$table->boolean('category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
