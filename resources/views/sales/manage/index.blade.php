@extends('layouts.dbf_first')

@section('content')
<div class="container">
<div class="row">

<div id="title_bar" class="print_hide btn-toolbar">
	<button onclick="javascript:printdoc()" class="btn btn-info btn-sm pull-right">
		<span class="glyphicon glyphicon-print">&nbsp;</span>Print	</button>
	<a href="{{route('sales.index')}}" class="btn btn-info btn-sm pull-right" id="show_sales_button"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>Sales Register</a></div>



<div id="table_holder">
	<div class="bootstrap-table"><div class="fixed-table-toolbar"><div class="bs-bars pull-left"><div id="toolbar">
	<div class="pull-left form-inline" role="toolbar">
		<button id="delete" class="btn btn-default btn-sm print_hide" disabled="disabled">
			<span class="glyphicon glyphicon-trash">&nbsp;</span>Delete		</button>

		<input type="text" name="daterangepicker" value="" class="form-control input-sm" id="daterangepicker" style="width: 180px;">
		<div class="btn-group bootstrap-select show-tick show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" data-id="filters" title="Cash" aria-expanded="false"><span class="filter-option pull-left">Cash</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" style="max-height: 177.05px; overflow: hidden; min-height: 92px;"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 165.05px; overflow-y: auto; min-height: 80px;"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Cash</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Due</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Check</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Invoices</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div>
		<select name="filters[]" id="filters" data-none-selected-text="Nothing selected." class="selectpicker show-menu-arrow" data-selected-text-format="count > 1" data-style="btn-default btn-sm" data-width="fit" multiple="multiple" tabindex="-98">
		<option value="only_cash">Cash</option>
		<option value="only_due">Due</option>
		<option value="only_check">Check</option>
		<option value="only_invoices">Invoices</option>
		</select>
	</div>
</div>
</div>
</div>
<div class="col-xs-3 mb-2" align="center">
<p>
  @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
</p>
 </div>
<div class="columns columns-right btn-group pull-right">
	<div class="keep-open btn-group" title="Columns">
		<button type="button" aria-label="columns" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
			<i class="glyphicon glyphicon-th icon-th"></i> 
			<span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
				<li role="menuitem"><label><input type="checkbox" data-field="sale_id" value="1" checked="checked"> Id</label></li><li role="menuitem"><label>
					<input type="checkbox" data-field="sale_time" value="2" checked="checked"> Time</label></li><li role="menuitem"><label>
					<input type="checkbox" data-field="customer_name" value="3" checked="checked"> Customer</label></li><li role="menuitem"><label>
					<input type="checkbox" data-field="amount_due" value="4" checked="checked"> Amount Due</label></li><li role="menuitem"><label><input type="checkbox" data-field="amount_tendered" value="5" checked="checked"> Amount Tendered</label></li><li role="menuitem"><label>
					<input type="checkbox" data-field="change_due" value="6" checked="checked"> Change Due</label></li><li role="menuitem"><label>
					<input type="checkbox" data-field="payment_type" value="7" checked="checked"> Type</label></li><li role="menuitem">
					<label>
						<input type="checkbox" data-field="invoice_number" value="8" checked="checked"> Ref #</label>
					</li>
				</ul>
			</div>
			<div class="export btn-group">
				<button class="btn btn-default btn-sm dropdown-toggle" aria-label="export type" title="Export data" data-toggle="dropdown" type="button"><i class="glyphicon glyphicon-export icon-share"></i> <span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
					<li role="menuitem" data-type="json"><a href="javascript:void(0)">JSON</a></li>
					<li role="menuitem" data-type="xml"><a href="javascript:void(0)">XML</a></li>
					<li role="menuitem" data-type="csv"><a href="javascript:void(0)">CSV</a></li>
					<li role="menuitem" data-type="txt"><a href="javascript:void(0)">TXT</a></li>
					<li role="menuitem" data-type="sql"><a href="javascript:void(0)">SQL</a></li>
					<li role="menuitem" data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li>
					<li role="menuitem" data-type="pdf"><a href="javascript:void(0)">PDF</a></li>
				</ul>
			</div>
			</div>
			<div class="pull-right search"><input class="form-control input-sm" type="text" placeholder="Search"></div></div>
			<div class="fixed-table-container" style="padding-bottom: 0px;"><div class="fixed-table-header" style="display: none;">
			<table></table>
		</div>
	<div class="fixed-table-body">
	<div class="fixed-table-loading" style="top: 42px; display: none;">Loading, please wait...</div>
	<div id="table-sticky-header-sticky-header-container" class="fixed-table-container hidden" style="top: 0px; width: 749px;">
	<div style="position:absolute;width:100%;overflow-x:hidden;">
	<thead>
		<tr>
		<th class="bs-checkbox print_hide" style="width: 36px; min-width: 30px;" data-field="checkbox">
			<div class="th-inner ">
				<input name="btSelectAll" type="checkbox"></div>
				<div class="fht-cell"></div></th>
				<th class="" style="min-width: 52px;" data-field="sale_id">
					<div class="th-inner sortable both">Id</div>
					<div class="fht-cell"></div></th>
					<th class="" style="min-width: 81px;" data-field="sale_time"><div class="th-inner sortable both">Time</div>
					<div class="fht-cell"></div></th>
					<th class="" style="min-width: 99px;" data-field="customer_name">
					<div class="th-inner sortable both">Customer</div><div class="fht-cell"></div></th>
					<th class="" style="min-width: 115px;" data-field="amount_due">
					<div class="th-inner sortable both">Amount Due</div>
					<div class="fht-cell"></div></th>
					<th class="" style="min-width: 148px;" data-field="amount_tendered"><div class="th-inner sortable both">Amount Tendered</div>
					<div class="fht-cell"></div></th>
					<th class="" style="min-width: 114px;" data-field="change_due"><div class="th-inner sortable both">Change Due</div><div class="fht-cell"></div></th>
					<th class="" style="min-width: 67px;" data-field="payment_type"><div class="th-inner sortable both">Type</div><div class="fht-cell"></div></th>
					<th class="" style="min-width: 80px;" data-field="invoice_number"><div class="th-inner sortable both">Ref #</div><div class="fht-cell"></div></th>
					<th class="print_hide" style="min-width: 29px;" data-field="invoice"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
					<th class="print_hide" style="min-width: 20px;" data-field="credit_note"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
					<th class="print_hide" style="min-width: 29px;" data-field="invoice_excel"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
					<th class="print_hide" style="min-width: 29px;" data-field="edit"><div class="th-inner "></div><div class="fht-cell"></div></th>
				</tr>
			</thead>
		</div>
	</div>
	<div id="table-sticky-header_sticky_anchor_begin"></div>
	<table id="salesManage" class="table table-hover table-striped">
		<thead id="table-sticky-header">
			<tr>
				<th class="bs-checkbox print_hide" style="width: 36px; " data-field="checkbox">
					<div class="th-inner ">
						<input name="btSelectAll" type="checkbox">
					</div>
					<div class="fht-cell"></div></th>
					<th class="" style="" data-field="sale_id">
						<div class="th-inner sortable both">Id</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="sale_time"><div class="th-inner sortable both">Time</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="customer_name"><div class="th-inner sortable both">Customer</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="amount_due"><div class="th-inner sortable both">Amount Due</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="amount_tendered"><div class="th-inner sortable both">Amount Tendered</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="change_due"><div class="th-inner sortable both">Change Due</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="payment_type"><div class="th-inner sortable both">Type</div><div class="fht-cell"></div></th>
						<th class="" style="" data-field="invoice_number"><div class="th-inner sortable both">Ref #</div><div class="fht-cell"></div></th>
						<th class="print_hide" style="" data-field="invoice"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
						<th class="print_hide" style="" data-field="credit_note"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
						<th class="print_hide" style="" data-field="invoice_excel"><div class="th-inner ">&nbsp;</div><div class="fht-cell"></div></th>
						<th class="print_hide" style="" data-field="edit"><div class="th-inner "></div><div class="fht-cell"></div></th></tr>
					</thead>
					<tbody>
						@foreach($salesManage as $value)
						{{-- {{ dd($value) }} --}}
						<tr data-index="0" data-uniqueid="27878"> 
						<td class="bs-checkbox print_hide">
						<input data-index="0" name="btSelectItem" type="checkbox"></td> 
						<td class="" style="">{{$value->id}}</td> 
						<td class="" style="">{{$value->created_at}}</td> 
						<td class="" style="">{{$value->customer_name}}</td>
						<td class="" style="">₹&nbsp;{{$value->sale_amount_due1}}</td> 
						<td class="" style="">₹&nbsp;{{$value->amount_tendered1}}</td> 
						<td class="" style="">₹&nbsp;{{$value->change_due}}</td> 
						<td class="" style="">{{$value->payment_types}}<br>{{$value->amount_tendered1}}	</td> 
						<td class="" style="">{{$value->ref_invoice_number}}</td> 
						<td class="print_hide" style="">
							<a href="{{ route('sales-invoice',$value->id) }}" title="Show Invoice" target="_blank"><span class="glyphicon glyphicon-list-alt"></span></a>
						</td> 
						<td class="print_hide" style="">-</td> 
						<td class="print_hide" style=""><a href="http://newpos.dbfindia.com/sales/invoice_excel/27878" class="print_hide" title="invoice_excel (TBD)"><span class="glyphicon glyphicon-barcode"></span></a></td>
						 
						<td class="print_hide" style=""><a href="#" class="modal-dlg print_hide" data-btn-delete="Delete" data-btn-submit="Submit" title="Update"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#exampleModalLong{{ $value->id }}"></span></a></td> 
					</tr>
				</tr>

{{-- Code for Edit........................ --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="bootstrap-dialog-body">
			<div class="bootstrap-dialog-message"><div><div id="required_fields_message">Fields in red are required</div>

	<ul id="error_message_box" class="error_message_box"></ul>

	<form action="{{ route('sales-manage.update',$value->id) }}" id="sales_edit_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
	 @csrf
    @method('PUT')                                                                                               
	<fieldset id="sale_basic_info">
		<div class="form-group form-group-sm">
			<label for="receipt_number" class="control-label col-xs-3">Sale #</label>				
			<a href="http://newpos.dbfindia.com/sales/receipt/27878" target="_blank" class="control-label col-xs-8" style="text-align:left">POS {{$value->id}}</a><br>	
		</div>
		
		<div class="form-group form-group-sm">
			<label for="date" class="control-label col-xs-3">Sale Date</label>
			<div class="col-xs-8">
				<input type="text" name="created_at" value="{{$value->created_at}}" id="datetime" class="form-control input-sm">
			</div><br><br>	
		</div>
			<div class="form-group form-group-sm">
				<label for="invoice_number" class="control-label col-xs-3">Ref #</label>	
				<div class="col-xs-8">
					<input type="text" name="ref_invoice_number" value="{{$value->ref_invoice_number}}" id="invoice_number" class="form-control input-sm">
				</div><br><br>	
			</div>
		
				<div class="form-group form-group-sm">
				<label for="payment_0" class="control-label col-xs-3">Payment Type</label>					
				<div class="col-xs-4">
				<select name="payment_types" id="payment_types_0" class="form-control">
				<option value="{{$value->payment_types}}" selected="selected">{{$value->payment_types}}</option>
				<option value="Cash">Cash
				</option>
				<option value="Debit Card">Debit Card</option>
				<option value="Credit Card">Credit Card</option>
				<option value="PayTM">PayTM</option>
				</select>	
				</div>
				<div class="col-xs-4">
					<div class="input-group input-group-sm">
						<span class="input-group-addon input-sm"><b>₹</b></span>
						<input type="text" name="amount_tendered1" value="{{$value->amount_tendered1}}" id="amount_tendered1" class="form-control input-sm" readonly="true">
					</div>
				</div>
			</div>
		
		<input type="hidden" name="number_of_payments" value="1">
		<div class="form-group form-group-sm">
			<label for="customer" class="control-label col-xs-3">Name</label><br><br>
			<div class="col-xs-8">
				<input type="text" name="customer_name" value="{{$value->customer_name}}" id="customer_name" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
				<input type="hidden" name="customer_id" value="12447">
			</div>	
		</div><br>
		
		<div class="form-group form-group-sm">
			<label for="employee" class="control-label col-xs-3">Employee</label>	
			<div class="col-xs-8">
				
				<input type="hidden" name="employee_id" value="{{ $value->Location->id }}">
				<select name="dropdown_employee_id" id="employee_id" class="form-control" disabled="true">
					{{-- <option value="11306">Ahmedabad Login</option>
					<option value="10">DBF Annapurna Login</option>
					<option value="11">DBF Bhanvarkuan Login</option>
					<option value="4">DBF Indraprastha Login</option>
					<option value="13">DBF Mahalaxmi Login</option>
					<option value="8">YS Sir Login</option>
					<option value="1439">JP Sir  Login</option>
					<option value="7562">Shop 114 Login</option>
					<option value="12393">Material Mgmt</option> --}}

					<option value="{{ $value->Location->id }}" selected="selected">{{ $value->Location->shop_name }}</option>
					{{-- <option value="9">DBF Accounts Panel</option>
					<option value="16">DBF Admin Panel</option>
					<option value="11143">DBF Admin2 Panel</option>
					<option value="15">DBF Main Panel</option>
					<option value="7">LH Warehouse Panel</option>
					<option value="10544">DBF Airport Road Shop</option>
					<option value="8138">DBF Khandwa Road Shop</option>
					<option value="3">Amazon Stock</option>
					<option value="2141">Apnagps Stock</option>
					<option value="14">DN Warehouse Stock</option>
				</select> --}}
			</div> <!-- Set Employee dropdown not editable -->
		</div><br><br>
		
		<div class="form-group form-group-sm">
			<label for="comment" class="control-label col-xs-3">Comment</label>	
				<div class="col-xs-8">
				<textarea name="comment" cols="40" rows="10" id="comment" class="form-control input-sm"></textarea>
			</div>
		</div>
	</fieldset>
</div>
	</div>
		</div>
			</div>
				<div class="modal-footer" style="display: block;">
					<div class="bootstrap-dialog-footer">
						<div class="bootstrap-dialog-footer-buttons">
							
							<button class="btn btn-primary" id="submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
			<form action="{{ route('sales-manage.destroy',$value->id) }}" method="post">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger" id="delete">Delete</button>
			</form>
				<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul>
			</div>
		</div>
	</div>
			@endforeach
			</tbody>
		</table>
	 </div>
	</div>
</div>

<div id="payment_summary"><div id="report_summary"><div class="summary_row">Cash: ₹&nbsp;24,82,455</div></div></div>

		</div>
	</div>

	<div id="footer">
		<!-- <div class="jumbotron push-spaces"> -->
			<!-- <strong>  			 - </strong>.
						<a href="https://github.com/jekkos/opensourcepos" target="_blank"></a>
			 -->
		<!-- </div> -->
	</div>


</div>
<div class="daterangepicker dropdown-menu ltr show-calendar opensright" style="display: none; top: 199.95px; left: 181.783px; right: auto;">
	<div class="ranges">
		<ul><li data-range-key="Today" class="active">Today</li>
			<li data-range-key="Today Last Year">Today Last Year</li>
			<li data-range-key="Yesterday">Yesterday</li>
			<li data-range-key="Last 7 Days">Last 7 Days</li>
			<li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="Current Month">Current Month</li>
			<li data-range-key="Same Month To Same Day Last Year">Same Month To Same Day Last Year</li>
			<li data-range-key="Same Month Last Year">Same Month Last Year</li><li data-range-key="Last Month">Last Month</li>
			<li data-range-key="Current Year">Current Year</li><li data-range-key="Last Year">Last Year</li>
			<li data-range-key="Current Fiscal Year">Current Fiscal Year</li>
			<li data-range-key="Last Fiscal Year">Last Fiscal Year</li>
			<li data-range-key="All Time">All Time</li><li data-range-key="Custom">Custom</li>
		</ul>
		<div class="range_inputs">
			<button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> 
			<button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
		</div>
	</div>
		<div class="calendar left">
			<div class="daterangepicker_input">
				<input class="input-mini form-control active" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
				<div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div>
				<div class="calendar-table">
					<table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th>
						<th colspan="5" class="month">April 2020</th>
						<th></th>
					</tr>
					<tr>
						<th>Su</th>
						<th>Mo</th>
						<th>Tu</th>
						<th>We</th>
						<th>Th</th>
						<th>Fr</th>
						<th>Sa</th>
						<th>Su</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="weekend off available" data-title="r0c0">29</td>
						<td class="off available" data-title="r0c1">30</td>
						<td class="off available" data-title="r0c2">31</td>
						<td class="available" data-title="r0c3">1</td>
						<td class="available" data-title="r0c4">2</td>
						<td class="available" data-title="r0c5">3</td>
						<td class="weekend available" data-title="r0c6">4</td></tr>
						<tr>
							<td class="weekend available" data-title="r1c0">5</td>
							<td class="available" data-title="r1c1">6</td>
							<td class="available" data-title="r1c2">7</td>
							<td class="available" data-title="r1c3">8</td>
							<td class="available" data-title="r1c4">9</td>
							<td class="available" data-title="r1c5">10</td>
							<td class="weekend available" data-title="r1c6">11</td>
						</tr>
						<tr>
							<td class="weekend available" data-title="r2c0">12</td>
							<td class="available" data-title="r2c1">13</td>
							<td class="available" data-title="r2c2">14</td>
							<td class="available" data-title="r2c3">15</td>
							<td class="available" data-title="r2c4">16</td>
							<td class="available" data-title="r2c5">17</td>
							<td class="weekend available" data-title="r2c6">18</td>
						</tr>
						<tr>
							<td class="weekend available" data-title="r3c0">19</td>
							<td class="available" data-title="r3c1">20</td>
							<td class="available" data-title="r3c2">21</td>
							<td class="available" data-title="r3c3">22</td>
							<td class="available" data-title="r3c4">23</td>
							<td class="available" data-title="r3c5">24</td>
							<td class="weekend available" data-title="r3c6">25</td>
						</tr>
						<tr>
							<td class="weekend available" data-title="r4c0">26</td>
							<td class="available" data-title="r4c1">27</td>
							<td class="available" data-title="r4c2">28</td>
							<td class="available" data-title="r4c3">29</td>
							<td class="available" data-title="r4c4">30</td>
							<td class="off available" data-title="r4c5">1</td>
							<td class="weekend off available" data-title="r4c6">2</td>
						</tr>
						<tr>
							<td class="weekend off available" data-title="r5c0">3</td>
							<td class="off available" data-title="r5c1">4</td>
							<td class="off available" data-title="r5c2">5</td>
							<td class="off available" data-title="r5c3">6</td>
							<td class="off available" data-title="r5c4">7</td>
							<td class="off available" data-title="r5c5">8</td>
							<td class="weekend off available" data-title="r5c6">9</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="calendar right">
			<div class="daterangepicker_input">
				<input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
				<div class="calendar-time" style="display: none;"><div></div>
				<i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div>
				<div class="calendar-table">
					<table class="table-condensed">
						<thead>
							<tr>
								<th></th>
								<th colspan="5" class="month">May 2020</th><th></th></tr>
								<tr>
									<th>Su</th>
									<th>Mo</th>
									<th>Tu</th>
									<th>We</th>
									<th>Th</th>
									<th>Fr</th>
									<th>Sa</th>
									<th>Su</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="weekend off available" data-title="r0c0">26</td>
									<td class="off available" data-title="r0c1">27</td>
									<td class="off available" data-title="r0c2">28</td>
									<td class="off available" data-title="r0c3">29</td>
									<td class="off available" data-title="r0c4">30</td>
									<td class="available" data-title="r0c5">1</td><td class="weekend available" data-title="r0c6">2</td>
								</tr>
								<tr>
									<td class="weekend available" data-title="r1c0">3</td>
									<td class="available" data-title="r1c1">4</td>
									<td class="available" data-title="r1c2">5</td>
									<td class="available" data-title="r1c3">6</td>
									<td class="available" data-title="r1c4">7</td>
									<td class="available" data-title="r1c5">8</td>
									<td class="weekend available" data-title="r1c6">9</td>
								</tr>
								<tr>
									<td class="weekend available" data-title="r2c0">10</td>
									<td class="available" data-title="r2c1">11</td>
									<td class="available" data-title="r2c2">12</td>
									<td class="available" data-title="r2c3">13</td>
									<td class="available" data-title="r2c4">14</td>
									<td class="available" data-title="r2c5">15</td>
									<td class="weekend available" data-title="r2c6">16</td>
								</tr>
								<tr>
									<td class="weekend available" data-title="r3c0">17</td>
									<td class="available" data-title="r3c1">18</td>
									<td class="available" data-title="r3c2">19</td>
									<td class="available" data-title="r3c3">20</td>
									<td class="available" data-title="r3c4">21</td>
									<td class="available" data-title="r3c5">22</td>
									<td class="weekend available" data-title="r3c6">23</td>
								</tr>
								<tr>
									<td class="weekend available" data-title="r4c0">24</td>
									<td class="available" data-title="r4c1">25</td>
									<td class="available" data-title="r4c2">26</td>
									<td class="available" data-title="r4c3">27</td>
									<td class="today active start-date active end-date available" data-title="r4c4">28</td><td class="off disabled" data-title="r4c5">29</td>
									<td class="weekend off disabled" data-title="r4c6">30</td>
								</tr>
								<tr>
									<td class="weekend off disabled" data-title="r5c0">31</td>
									<td class="off off disabled" data-title="r5c1">1</td>
									<td class="off off disabled" data-title="r5c2">2</td>
									<td class="off off disabled" data-title="r5c3">3</td>
									<td class="off off disabled" data-title="r5c4">4</td>
									<td class="off off disabled" data-title="r5c5">5</td>
									<td class="weekend off off disabled" data-title="r5c6">6</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	// when any filter is clicked and the dropdown window is closed
	$('#filters').on('hidden.bs.select', function(e) {
		table_support.refresh();
	});
	
	// load the preset datarange picker
	$('#daterangepicker').css("width","180");
		var start_date = "2020-05-28";
		var end_date   = "2020-05-28";

		$('#daterangepicker').daterangepicker({
			"ranges": {
				"Today": [
					"28/05/2020",
					"28/05/2020"
				],
				"Today Last Year": [
					"28/05/2019",
					"28/05/2019"
				],
				"Yesterday": [
					"27/05/2020",
					"27/05/2020"
				],
				"Last 7 Days": [
					"22/05/2020",
					"28/05/2020"
				],
				"Last 30 Days": [
					"29/04/2020",
					"28/05/2020"
				],
				"Current Month": [
					"01/05/2020",
					"31/05/2020"
				],
				"Same Month To Same Day Last Year": [
					"01/05/2019",
					"28/05/2019"
				],
				"Same Month Last Year": [
					"01/05/2019",
					"31/05/2019"
				],
				"Last Month": [
					"01/04/2020",
					"30/04/2020"
				],
				"Current Year": [
					"01/01/2020",
					"30/04/2021"
				],
				"Last Year": [
					"01/01/2019",
					"31/12/2019"
				],
				"Current Fiscal Year": [
					"01/04/2020",
					"30/04/2021"
				],
				"Last Fiscal Year": [
					"01/04/2019",
					"31/03/2020"
				],
				"All Time": [
					"01/01/2010",
					"28/05/2020"
				],
			},
			"locale": {
				"format": 'DD/MM/YYYY',
				"separator": " - ",
				"applyLabel": "Apply",
				"cancelLabel": "Cancel",
				"fromLabel": "From",
				"toLabel": "To",
				"customRangeLabel": "Custom",
				"daysOfWeek": [
					"Su",
					"Mo",
					"Tu",
					"We",
					"Th",
					"Fr",
					"Sa",
					"Su"
				],
				"monthNames": [
					"January",
					"February",
					"March",
					"April",
					"May",
					"June",
					"July",
					"August",
					"September",
					"October",
					"November",
					"December"
				],
				"firstDay": 0			},
			"alwaysShowCalendars": true,
			"startDate": "28/05/2020",
			"endDate": "28/05/2020",
			"minDate": "01/01/2010",
			"maxDate": "28/05/2020"
		}, function(start, end, label) {
			start_date = start.format('YYYY-MM-DD');
			end_date = end.format('YYYY-MM-DD');
		});

	$("#daterangepicker").on('apply.daterangepicker', function(ev, picker) {
		table_support.refresh();
	});

	(function ($) {
	'use strict';

	$.fn.bootstrapTable.locales['en-US'] = {
		formatLoadingMessage: function () {
			return "Loading, please wait...";
		},
		formatRecordsPerPage: function (pageNumber) {
			return "{0} rows per page".replace('{0}', pageNumber);
		},
		formatShowingRows: function (pageFrom, pageTo, totalRows) {
			return "Showing {0} to {1} of {2} rows".replace('{0}', pageFrom).replace('{1}', pageTo).replace('{2}', totalRows);
		},
		formatSearch: function () {
			return "Search";
		},
		formatNoMatches: function () {
			return "No Sales to display.";
		},
		formatPaginationSwitch: function () {
			return "Hide/Show pagination";
		},
		formatRefresh: function () {
			return "Refresh";
		},
		formatToggle: function () {
			return "Toggle";
		},
		formatColumns: function () {
			return "Columns";
		},
		formatAllRows: function () {
			return "All";
		},
		formatConfirmDelete : function() {
			return "Are you sure you want to delete the selected Sale(s)?";
		},
		formatConfirmRestore : function() {
		return "Are you sure you want to restore the selected Sale(s)?";
		}
	};

	$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales["en-US"]);

})(jQuery);
	table_support.init({
		resource: 'http://newpos.dbfindia.com/sales',
		headers: [{"field":"checkbox","title":"select","switchable":true,"sortable":false,"checkbox":"select","class":"print_hide","sorter":""},{"field":"sale_id","title":"Id","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"sale_time","title":"Time","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"customer_name","title":"Customer","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"amount_due","title":"Amount Due","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"amount_tendered","title":"Amount Tendered","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"change_due","title":"Change Due","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"payment_type","title":"Type","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"invoice_number","title":"Ref #","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"invoice","title":"&nbsp","switchable":false,"sortable":false,"checkbox":false,"class":"print_hide","sorter":""},{"field":"credit_note","title":"&nbsp","switchable":false,"sortable":false,"checkbox":false,"class":"print_hide","sorter":""},{"field":"invoice_excel","title":"&nbsp","switchable":false,"sortable":false,"checkbox":false,"class":"print_hide","sorter":""},{"field":"edit","title":"","switchable":false,"sortable":false,"checkbox":false,"class":"print_hide","sorter":""}],
		pageSize: 20,
		uniqueId: 'sale_id',
		onLoadSuccess: function(response) {
			if($("#table tbody tr").length > 1) {
				$("#payment_summary").html(response.payment_summary);
				$("#table tbody tr:last td:first").html("");
			}
		},
		queryParams: function() {
			return $.extend(arguments[0], {
				start_date: start_date,
				end_date: end_date,
				filters: $("#filters").val() || [""]
			});
		},
		columns: {
			'invoice': {
				align: 'center'
			}
		}
	});
});
</script>
<script type="text/javascript">
function printdoc()
{
	// install firefox addon in order to use this plugin
	if (window.jsPrintSetup)
	{
		// set top margins in millimeters
		jsPrintSetup.setOption('marginTop', '');
		jsPrintSetup.setOption('marginLeft', '');
		jsPrintSetup.setOption('marginBottom', '');
		jsPrintSetup.setOption('marginRight', '');

					// set page header
			jsPrintSetup.setOption('headerStrLeft', '');
			jsPrintSetup.setOption('headerStrCenter', '');
			jsPrintSetup.setOption('headerStrRight', '');
					// set empty page footer
			jsPrintSetup.setOption('footerStrLeft', '');
			jsPrintSetup.setOption('footerStrCenter', '');
			jsPrintSetup.setOption('footerStrRight', '');
		
		var printers = jsPrintSetup.getPrintersList().split(',');
		// get right printer here..
		for(var index in printers) {
			var default_ticket_printer = window.localStorage && localStorage['takings_printer'];
			var selected_printer = printers[index];
			if (selected_printer == default_ticket_printer) {
				// select epson label printer
				jsPrintSetup.setPrinter(selected_printer);
				// clears user preferences always silent print value
				// to enable using 'printSilent' option
				jsPrintSetup.clearSilentPrint();
									// Suppress print dialog (for this context only)
					jsPrintSetup.setOption('printSilent', 1);
								// Do Print
				// When print is submitted it is executed asynchronous and
				// script flow continues after print independently of completetion of print process!
				jsPrintSetup.print();
			}
		}
	}
	else
	{
		window.print();
	}
}

</script>
<script type="text/javascript">
$(document).ready(function()
{	
		
	
$.fn.datetimepicker.dates['english'] = {
    days: [
		"Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
		],
        daysShort: [
		"Sun",
        "Mon",
        "Tue",
        "Wed",
        "Thu",
        "Fri",
        "Sat"
		],
        daysMin: [
		"Su",
        "Mo",
        "Tu",
        "We",
        "Th",
        "Fr",
        "Sa"
		],
        months: [
		"January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
		],
        monthsShort: [
		"Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
		],
    today: "Today",
        meridiem: ["AM", "PM"],
        weekStart: 0};	
	$('#datetime').datetimepicker({
		format: "dd/mm/yyyy HH:ii:ss P",
		startDate: "01/01/2010 12:00:00 AM",
					showMeridian: true,
				minuteStep: 1,
		autoclose: true,
		todayBtn: true,
		todayHighlight: true,
		bootcssVer: 3,
		language: 'en-US'
	});

	var fill_value =  function(event, ui) {
		event.preventDefault();
		$("input[name='customer_id']").val(ui.item.value);
		$("input[name='customer_name']").val(ui.item.label);
	};

	$("#customer_name").autocomplete(
	{
		source: 'http://newpos.dbfindia.com/customers/suggest',
		minChars: 0,
		delay: 15, 
		cacheLength: 1,
		appendTo: '.modal-content',
		select: fill_value,
		focus: fill_value
	});

	$('button#delete').click(function() {
		dialog_support.hide();
		table_support.do_delete('http://newpos.dbfindia.com/sales', 27878);
	});

	$('button#restore').click(function() {
		dialog_support.hide();
		table_support.do_restore('http://newpos.dbfindia.com/sales', 27878);
	});

	var submit_form = function()
	{ 
		$(this).ajaxSubmit(
		{
			success: function(response)
			{
				dialog_support.hide();
				table_support.handle_submit('http://newpos.dbfindia.com/sales', response);
			},
			dataType: 'json'
		});
	};

	$('#sales_edit_form').validate($.extend(
	{
		submitHandler: function(form)
		{
			submit_form.call(form);
		},
		
		rules:
		{
			invoice_number:
			{
				remote:
				{
					url: "http://newpos.dbfindia.com/sales/check_invoice_number",
					type: "POST",
					data: $.extend(csrf_form_base(),
					{
						"sale_id" : 27878,
						"invoice_number" : function()
						{
							return $("#invoice_number").val();
						}
					})
				}
			}
		},
		messages: 
		{
			invoice_number: 'Invoice Number must be unique.'
		}
	}, form_support.error));
});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<script type="text/javascript">
   
   $(document).ready( function () {
    // $('#myTable').DataTable();
    $('#salesManage').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
        ]
    } );
} );
</script>
@endsection
