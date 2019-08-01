<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGiftcardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('giftcards', function(Blueprint $table)
		{
			$table->timestamp('record_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('giftcard_id', true);
			$table->string('giftcard_number')->nullable()->unique('giftcard_number');
			$table->decimal('value', 15);
			$table->integer('deleted')->default(0);
			$table->integer('person_id')->nullable()->index('person_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('giftcards');
	}

}
