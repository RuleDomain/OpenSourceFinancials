<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxJurisdictionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (Schema::hasTable('tax_jurisdictions')) { return; }
		Schema::create('tax_jurisdictions', function(Blueprint $table)
		{
			$table->integer('jurisdiction_id', true);
			$table->string('jurisdiction_name')->nullable();
			$table->string('tax_group', 32);
			$table->smallInteger('tax_type');
			$table->string('reporting_authority')->nullable();
			$table->boolean('tax_group_sequence')->default(0);
			$table->boolean('cascade_sequence')->default(0);
			$table->integer('deleted')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tax_jurisdictions');
	}

}
