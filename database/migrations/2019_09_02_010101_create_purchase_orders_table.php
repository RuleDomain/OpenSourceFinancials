<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('purchase_orders', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('po_number', 30)->nullable();
//              Uses token based assignment
            $table->tinyInteger('status')->default(0);
//              Values: 0-New, 1=Open, 2=Partial , 3=Fulfilled, 4=Invoiced, 5=Complete, 6=Canceled
            $table->tinyInteger('po_type')->default(0);
//              Values: 0-Manual, 1=Replenishment
            $table->integer('supplier_id')->nullable()->index('supplier_id');
            $table->integer('preparer_id')->nullable()->index('preparer_id');
            $table->timestamp('when_prepared')->nullable();
            $table->integer('approver_id')->nullable()->index('approver_id');
            $table->timestamp('when_approved')->nullable();
            $table->integer('submitter_id')->nullable()->index('submittter_id');
            $table->timestamp('when_submitted')->nullable();
            $table->text('comment', 65535)->nullable();
            $table->string('reference_code', 35)->nullable();
            $table->decimal('total_amount', 15,2);
            $table->decimal('amount_invoiced', 15,2);
            $table->decimal('adjusted_amount', 15,2);
            $table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_orders');
	}

}
