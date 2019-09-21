@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('core.dashboard') }}</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif
                        <h3>{{ __('core.action_items') }}</h3>
							<div class='row mb-2'>
								<div class='col'>{{ __('core.x_items_are_below_reorder_point', ['p1' => $nbr_below_stock]) }}</div>
								<div class='col'><button type="button" class="btn btn-primary btn-sm">{{ __('core.replenish_stock') }}</button></div>
							</div>
							<div class='row mb-2'>
								<div class='col'>{{ __ ('core.x_work_order_items_need_to_be_ordered', ['p1' => $nbr_work_order_items]) }}</div>
								<div class='col'><button type="button" class="btn btn-primary btn-sm">{{ __('core.order_work_order_items') }}</button></div>
							</div>
							<div class='row mb-2'>
								<div class='col'>{{ __('core.there_are_x_unapproved_requisition_items', ['p1'=> $nbr_unapproved_req_items]) }}</div>
								<div class='col'><button type="button" class="btn btn-primary btn-sm">{{ __('core.approve_requisitions') }}</button></div>
							</div>
							<div class='row'>
								<div class='col'>{{ __('core.there_are_x_open_requisition_items', ['p1' => $nbr_open_req_items]) }}</div>
								<div class='col'><button type="button" class="btn btn-primary btn-sm">{{ __('core.create_purchase_order') }}</button></div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
