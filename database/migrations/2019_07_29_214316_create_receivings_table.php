<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceivingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receivings', function(Blueprint $table)
		{
			$table->timestamp('receiving_time')->default(DB::raw('CURRENT_TIMESTAMP'))->index('receiving_time');
			$table->integer('supplier_id')->nullable()->index('supplier_id');
			$table->integer('employee_id')->default(0)->index('employee_id');
			$table->text('comment', 65535)->nullable();
			$table->integer('receiving_id', true);
			$table->string('payment_type', 20)->nullable();
			$table->string('reference', 32)->nullable()->index('reference');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receivings');
	}

}
