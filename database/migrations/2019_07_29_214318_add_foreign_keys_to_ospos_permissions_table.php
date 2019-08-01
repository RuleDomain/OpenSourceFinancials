<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('permissions', function(Blueprint $table)
		{
			$table->foreign('module_id', 'ospos_permissions_ibfk_1')->references('module_id')->on('ospos_modules')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('location_id', 'ospos_permissions_ibfk_2')->references('location_id')->on('ospos_stock_locations')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('permissions', function(Blueprint $table)
		{
			$table->dropForeign('ospos_permissions_ibfk_1');
			$table->dropForeign('ospos_permissions_ibfk_2');
		});
	}

}
