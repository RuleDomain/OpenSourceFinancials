<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeDefinitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_definitions', function(Blueprint $table)
		{
			$table->integer('definition_id', true);
			$table->string('definition_name');
			$table->string('definition_type', 45);
			$table->string('definition_unit', 16)->nullable();
			$table->boolean('definition_flags');
			$table->integer('definition_fk')->nullable()->index('definition_fk');
			$table->boolean('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attribute_definitions');
	}

}
