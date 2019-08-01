<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposTaxRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tax_rates', function(Blueprint $table)
		{
			$table->foreign('rate_tax_category_id', 'ospos_tax_rates_ibfk_1')->references('tax_category_id')->on('ospos_tax_categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rate_tax_code_id', 'ospos_tax_rates_ibfk_2')->references('tax_code_id')->on('ospos_tax_codes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rate_jurisdiction_id', 'ospos_tax_rates_ibfk_3')->references('jurisdiction_id')->on('ospos_tax_jurisdictions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tax_rates', function(Blueprint $table)
		{
			$table->dropForeign('ospos_tax_rates_ibfk_1');
			$table->dropForeign('ospos_tax_rates_ibfk_2');
			$table->dropForeign('ospos_tax_rates_ibfk_3');
		});
	}

}
