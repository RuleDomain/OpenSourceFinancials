<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->timestamp('sale_time')->default(DB::raw('CURRENT_TIMESTAMP'))->index('sale_time');
			$table->integer('customer_id')->nullable()->index('customer_id');
			$table->integer('employee_id')->default(0)->index('employee_id');
			$table->text('comment', 65535)->nullable();
			$table->string('invoice_number', 32)->nullable()->unique('invoice_number');
			$table->string('quote_number', 32)->nullable();
			$table->integer('sale_id', true);
			$table->boolean('sale_status')->default(0);
			$table->integer('dinner_table_id')->nullable()->index('dinner_table_id');
			$table->string('work_order_number', 32)->nullable();
			$table->boolean('sale_type')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}

}
