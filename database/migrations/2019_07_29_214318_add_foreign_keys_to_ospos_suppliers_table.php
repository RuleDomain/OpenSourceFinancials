<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('suppliers', function(Blueprint $table)
		{
			$table->foreign('person_id', 'ospos_suppliers_ibfk_1')->references('person_id')->on('ospos_people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('suppliers', function(Blueprint $table)
		{
			$table->dropForeign('ospos_suppliers_ibfk_1');
		});
	}

}
