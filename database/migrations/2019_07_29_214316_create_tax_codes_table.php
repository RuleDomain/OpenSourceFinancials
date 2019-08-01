<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxCodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tax_codes', function(Blueprint $table)
		{
			$table->integer('tax_code_id', true);
			$table->string('tax_code', 32);
			$table->string('tax_code_name')->default('');
			$table->string('city')->default('');
			$table->string('state')->default('');
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
		Schema::drop('tax_codes');
	}

}
