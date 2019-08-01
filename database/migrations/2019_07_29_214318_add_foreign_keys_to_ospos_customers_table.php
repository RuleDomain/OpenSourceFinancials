<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customers', function(Blueprint $table)
		{
			$table->foreign('person_id', 'ospos_customers_ibfk_1')->references('person_id')->on('ospos_people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('package_id', 'ospos_customers_ibfk_2')->references('package_id')->on('ospos_customers_packages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sales_tax_code_id', 'ospos_customers_ibfk_3')->references('tax_code_id')->on('ospos_tax_codes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customers', function(Blueprint $table)
		{
			$table->dropForeign('ospos_customers_ibfk_1');
			$table->dropForeign('ospos_customers_ibfk_2');
			$table->dropForeign('ospos_customers_ibfk_3');
		});
	}

}
