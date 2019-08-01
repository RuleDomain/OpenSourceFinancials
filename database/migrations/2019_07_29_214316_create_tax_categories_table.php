<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tax_categories', function(Blueprint $table)
		{
			$table->integer('tax_category_id', true);
			$table->string('tax_category', 32);
			$table->boolean('tax_group_sequence');
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
		Schema::drop('tax_categories');
	}

}
