<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expense_categories', function(Blueprint $table)
		{
			$table->integer('expense_category_id', true);
			$table->string('category_name')->nullable()->unique('category_name');
			$table->string('category_description');
			$table->integer('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expense_categories');
	}

}
