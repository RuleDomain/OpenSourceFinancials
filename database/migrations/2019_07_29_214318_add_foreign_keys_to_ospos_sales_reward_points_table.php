<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOsposSalesRewardPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sales_reward_points', function(Blueprint $table)
		{
			$table->foreign('sale_id', 'ospos_sales_reward_points_ibfk_1')->references('sale_id')->on('ospos_sales')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sales_reward_points', function(Blueprint $table)
		{
			$table->dropForeign('ospos_sales_reward_points_ibfk_1');
		});
	}

}
