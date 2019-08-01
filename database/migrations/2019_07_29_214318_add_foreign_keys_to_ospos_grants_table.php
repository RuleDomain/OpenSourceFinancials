<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposGrantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('grants', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'ospos_grants_ibfk_1')->references('permission_id')->on('ospos_permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('person_id', 'ospos_grants_ibfk_2')->references('person_id')->on('ospos_employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('grants', function(Blueprint $table)
		{
			$table->dropForeign('ospos_grants_ibfk_1');
			$table->dropForeign('ospos_grants_ibfk_2');
		});
	}

}
