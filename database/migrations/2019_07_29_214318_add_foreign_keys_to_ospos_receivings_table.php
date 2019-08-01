<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposReceivingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receivings', function(Blueprint $table)
		{
			$table->foreign('employee_id', 'ospos_receivings_ibfk_1')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('supplier_id', 'ospos_receivings_ibfk_2')->references('person_id')->on('ospos_suppliers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receivings', function(Blueprint $table)
		{
			$table->dropForeign('ospos_receivings_ibfk_1');
			$table->dropForeign('ospos_receivings_ibfk_2');
		});
	}

}
