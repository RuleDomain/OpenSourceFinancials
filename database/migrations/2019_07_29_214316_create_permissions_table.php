<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('permissions')) { return; }
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->string('permission_id')->primary();
			$table->string('module_id')->index('module_id');
			$table->integer('location_id')->nullable()->index('ospos_permissions_ibfk_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
