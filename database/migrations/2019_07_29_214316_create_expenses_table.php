<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('expenses')) { return; }
		Schema::create('expenses', function(Blueprint $table)
		{
			$table->integer('expense_id', true);
			$table->timestamp('date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->index('date');
			$table->decimal('amount', 15);
			$table->string('payment_type', 40);
			$table->integer('expense_category_id')->index('expense_category_id');
			$table->string('description');
			$table->integer('employee_id')->index('employee_id');
			$table->integer('deleted')->default(0);
			$table->string('supplier_tax_code')->nullable();
			$table->decimal('tax_amount', 15)->nullable();
			$table->integer('supplier_id')->nullable()->index('ospos_expenses_ibfk_3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expenses');
	}

}
