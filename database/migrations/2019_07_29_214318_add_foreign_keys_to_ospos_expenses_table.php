<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('expenses', function(Blueprint $table)
		{
			$table->foreign('expense_category_id', 'ospos_expenses_ibfk_1')->references('expense_category_id')->on('ospos_expense_categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('employee_id', 'ospos_expenses_ibfk_2')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('supplier_id', 'ospos_expenses_ibfk_3')->references('person_id')->on('ospos_suppliers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('expenses', function(Blueprint $table)
		{
			$table->dropForeign('ospos_expenses_ibfk_1');
			$table->dropForeign('ospos_expenses_ibfk_2');
			$table->dropForeign('ospos_expenses_ibfk_3');
		});
	}

}
