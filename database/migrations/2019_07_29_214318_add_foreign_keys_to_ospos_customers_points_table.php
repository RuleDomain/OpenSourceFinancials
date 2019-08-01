<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposCustomersPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customers_points', function(Blueprint $table)
		{
			$table->foreign('person_id', 'ospos_customers_points_ibfk_1')->references('person_id')->on('ospos_customers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('package_id', 'ospos_customers_points_ibfk_2')->references('package_id')->on('ospos_customers_packages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sale_id', 'ospos_customers_points_ibfk_3')->references('sale_id')->on('ospos_sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customers_points', function(Blueprint $table)
		{
			$table->dropForeign('ospos_customers_points_ibfk_1');
			$table->dropForeign('ospos_customers_points_ibfk_2');
			$table->dropForeign('ospos_customers_points_ibfk_3');
		});
	}

}
