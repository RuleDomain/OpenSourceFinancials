<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesRewardPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('sales_reward_points')) { return; }
		Schema::create('sales_reward_points', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sale_id')->index('sale_id');
			$table->float('earned', 10, 0);
			$table->float('used', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_reward_points');
	}

}
