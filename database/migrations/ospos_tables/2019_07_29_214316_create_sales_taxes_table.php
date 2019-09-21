<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('sales_taxes')) { return; }
		Schema::create('sales_taxes', function(Blueprint $table)
		{
			$table->integer('sales_taxes_id', true);
			$table->integer('sale_id');
			$table->integer('jurisdiction_id')->nullable();
			$table->integer('tax_category_id')->nullable();
			$table->smallInteger('tax_type');
			$table->string('tax_group', 32);
			$table->decimal('sale_tax_basis', 15, 4);
			$table->decimal('sale_tax_amount', 15, 4);
			$table->boolean('print_sequence')->default(0);
			$table->string('name');
			$table->decimal('tax_rate', 15, 4);
			$table->integer('sales_tax_code_id')->nullable();
			$table->boolean('rounding_code')->default(0);
			$table->index(['sale_id','print_sequence','tax_group'], 'print_sequence');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_taxes');
	}

}
