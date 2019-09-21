<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashUpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('cash_up')) { return; }
		Schema::create('cash_up', function(Blueprint $table)
		{
			$table->integer('cashup_id', true);
			$table->timestamp('open_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('close_date')->nullable();
			$table->decimal('open_amount_cash', 15);
			$table->decimal('transfer_amount_cash', 15);
			$table->integer('note');
			$table->decimal('closed_amount_cash', 15);
			$table->decimal('closed_amount_card', 15);
			$table->decimal('closed_amount_check', 15);
			$table->decimal('closed_amount_total', 15);
			$table->string('description');
			$table->integer('open_employee_id')->index('open_employee_id');
			$table->integer('close_employee_id')->index('close_employee_id');
			$table->integer('deleted')->default(0);
			$table->decimal('closed_amount_due', 15);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cash_up');
	}

}
