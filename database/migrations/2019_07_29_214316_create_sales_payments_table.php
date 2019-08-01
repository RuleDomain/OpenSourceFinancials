<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_payments', function(Blueprint $table)
		{
			$table->integer('payment_id', true);
			$table->integer('sale_id');
			$table->string('payment_type', 40);
			$table->decimal('payment_amount', 15);
			$table->decimal('cash_refund', 15)->default(0.00);
			$table->integer('employee_id')->nullable()->index('employee_id');
			$table->timestamp('payment_time')->default(DB::raw('CURRENT_TIMESTAMP'))->index('payment_time');
			$table->string('reference_code', 40)->default('');
			$table->index(['sale_id','payment_type'], 'payment_sale');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_payments');
	}

}
