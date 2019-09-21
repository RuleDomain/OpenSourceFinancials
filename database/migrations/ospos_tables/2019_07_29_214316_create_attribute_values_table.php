<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('attribute_values')) { return; }
		Schema::create('attribute_values', function(Blueprint $table)
		{
			$table->integer('attribute_id', true);
			$table->string('attribute_value')->nullable()->unique('attribute_value');
			$table->date('attribute_date')->nullable();
			$table->decimal('attribute_decimal', 7, 3)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ospos_attribute_values');
	}

}
