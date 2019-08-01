<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSalesPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_payments', function(Blueprint $table)
		{
			$table->foreign('sale_id', 'ospos_sales_payments_ibfk_1')->references('sale_id')->on('ospos_sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('employee_id', 'ospos_sales_payments_ibfk_2')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_payments', function(Blueprint $table)
		{
			$table->dropForeign('ospos_sales_payments_ibfk_1');
			$table->dropForeign('ospos_sales_payments_ibfk_2');
		});
	}

}
