<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposCashUpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cash_up', function(Blueprint $table)
		{
			$table->foreign('open_employee_id', 'ospos_cash_up_ibfk_1')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('close_employee_id', 'ospos_cash_up_ibfk_2')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cash_up', function(Blueprint $table)
		{
			$table->dropForeign('ospos_cash_up_ibfk_1');
			$table->dropForeign('ospos_cash_up_ibfk_2');
		});
	}

}
