<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales', function(Blueprint $table)
		{
			$table->foreign('employee_id', 'ospos_sales_ibfk_1')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('customer_id', 'ospos_sales_ibfk_2')->references('person_id')->on('ospos_customers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('dinner_table_id', 'ospos_sales_ibfk_3')->references('dinner_table_id')->on('ospos_dinner_tables')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales', function(Blueprint $table)
		{
			$table->dropForeign('ospos_sales_ibfk_1');
			$table->dropForeign('ospos_sales_ibfk_2');
			$table->dropForeign('ospos_sales_ibfk_3');
		});
	}

}
