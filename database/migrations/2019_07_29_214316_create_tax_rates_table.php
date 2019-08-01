<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tax_rates', function(Blueprint $table)
		{
			$table->integer('tax_rate_id', true);
			$table->integer('rate_tax_code_id')->index('rate_tax_code_id');
			$table->integer('rate_tax_category_id')->index('rate_tax_category_id');
			$table->integer('rate_jurisdiction_id')->index('rate_jurisdiction_id');
			$table->decimal('tax_rate', 15, 4)->default(0.0000);
			$table->boolean('tax_rounding_code')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tax_rates');
	}

}
