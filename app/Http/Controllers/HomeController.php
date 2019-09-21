<?php
namespace App\Http\Controllers;

use App\Models\Items\Item;
use App\Models\Items\ItemQuantity;
use App\Models\Sales\SalesItem;
use App\Models\Purchasing\Requisition;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// Retrieve the number of items that are below their reorder quantity
		//  - with button to generate requisitions

		$onHandByItem = ItemQuantity::select('item_quantities.item_id',
				\DB::raw('SUM(ospos_item_quantities.quantity) as on_hand'))
			->groupBy('item_quantities.item_id');

		$nbr_below_stock = Item::joinSub($onHandByItem, 'onHandByItem', function ($join) {
				$join->on('items.item_id', '=', 'onHandByItem.item_id');
			})
			->where('items.reorder_level', '>',  0)
			->where('onHandByItem.on_hand', '<=', 'items.reorder_level')
			->count();

		$data['nbr_below_stock'] = $nbr_below_stock;

		// Retrieve the number of work order line items that need replenishment
		//  - with button to generate requisitions

		$onHandByItem = ItemQuantity::select('item_quantities.item_id',
			\DB::raw('SUM(ospos_item_quantities.quantity) as on_hand'))
			->groupBy('item_quantities.item_id');

		$workOrderDemand = SalesItem::select('sales_items.item_id',
			\DB::raw('SUM(ospos_sales_items.quantity_purchased) as qty_needed'))
			->join('sales', 'sales_items.sale_id', '=', 'sales.sale_id')
			->where('sales.sale_type', '=', 2)
			->groupBy('sales_items.item_id');

		$nbr_work_order_items = \DB::table(\DB::raw("(" . $workOrderDemand->toSql() . ") as ospos_workOrderDemand"))
			->mergeBindings($workOrderDemand->getQuery())
			->joinSub($onHandByItem, 'onHandByItem', function ($join) {
				$join->on('workOrderDemand.item_id', '=', 'onHandByItem.item_id');
			})
			->where('qty_needed', '>',  'onHandByItem.on_hand')
			->count();
		$data['nbr_work_order_items'] = $nbr_work_order_items;

		// TODO Retrieve a list of purchase orders that are scheduled for receipt in descending sequence
		//  - by expected delivery date
        //  - for today and for the next day

		// Retrieve the number of requisitions needing approval
		//  - with button to list requistions for approval

        $nbr_unapproved_req_items = Requisition::where('status', '=', 1)
            ->count();
		$data['nbr_unapproved_req_items'] = $nbr_unapproved_req_items;

		// Retrieve  the number of approved requisitions
		//  - with button to list requisitions by assigned vendor as starting point for preparing PO

        $nbr_open_req_items = Requisition::where('status', '=', 2)
            ->count();
		$data['nbr_open_req_items'] = $nbr_open_req_items;

		return view('home', $data);
	}
}
