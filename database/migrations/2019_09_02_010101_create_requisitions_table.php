<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequisitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requisitions', function(Blueprint $table)
		{
            $table->increments('id');
            $table->tinyInteger('requisition_source')->default(0);
//              Values: 0-Inventory Replenishment, 1=Work Order, 2=Just in Time Order , 3=General Purchase
            $table->tinyInteger('status')->default(0);
//              Values: 0-Pending, 1=Submitted, 2=Approved , 3=Assigned
            $table->integer('sale_id')->nullable()->index('sale_id');
            $table->integer('item_id')->nullable()->index('item_id');
            $table->integer('supplier_id')->nullable()->index('supplier_id');
            $table->integer('requisitioner_id')->default(0)->index('requisitioner_id');
            $table->integer('approver_id')->default(0)->index('approver_id');
            $table->string('supplier_item_code', 35)->nullable();
            $table->text('description')->nullable();
            $table->integer('purch_order_id');
            $table->smallInteger('po_line_nbr')->default(0);
            $table->decimal('orig_order_qty', 15,3);
            $table->decimal('cur_order_qty', 15,3);
            $table->decimal('qty_recvd', 15,3);
            $table->decimal('qty_canceled', 15,3);
            $table->decimal('item_cost_price', 15,2);
            $table->decimal('item_unit_price', 15,2);
            $table->integer('item_location')->nullable();
			$table->timestamp('receiving_time')->default(DB::raw('CURRENT_TIMESTAMP'))->index('receiving_time');
            $table->text('comment', 65535)->nullable();
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
		Schema::drop('requisitions');
	}
}
