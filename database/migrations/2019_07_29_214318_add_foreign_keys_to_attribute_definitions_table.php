<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAttributeDefinitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attribute_definitions', function(Blueprint $table)
		{
			$table->foreign('definition_fk', 'fk_attribute_definitions_ibfk_1')->references('definition_id')->on('attribute_definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('attribute_definitions', function(Blueprint $table)
		{
			$table->dropForeign('fk_attribute_definitions_ibfk_1');
		});
	}

}
