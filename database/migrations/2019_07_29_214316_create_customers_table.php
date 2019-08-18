<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('customers')) { return; }
		Schema::create('customers', function(Blueprint $table)
		{
			$table->integer('person_id')->index('person_id');
			$table->string('company_name')->nullable();
			$table->string('account_number')->nullable()->unique('account_number');
			$table->integer('taxable')->default(1);
			$table->string('tax_id', 32)->default('');
			$table->integer('sales_tax_code_id')->nullable()->index('sales_tax_code_id');
			$table->decimal('discount', 15)->default(0.00);
			$table->boolean('discount_type')->default(0);
			$table->integer('package_id')->nullable()->index('package_id');
			$table->integer('points')->nullable();
			$table->integer('deleted')->default(0);
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('employee_id');
			$table->integer('consent')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
