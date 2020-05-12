@extends('layouts.dbf')

@section('content')

				<div class="container">
		<div class="row">
<input type="hidden" id="sale_mode" value="sale">
<div id="register_wrapper">

<!-- Top register controls -->
	<form action="http://newpos.dbfindia.com/sales/change_mode" id="mode_form" class="form-horizontal panel panel-default sPanel1" method="post" accept-charset="utf-8">
                                                                                         ">

		<div class="panel-body form-group sPanel1">
			<ul>
				
					

				<!-- TAX TYPE -->
				<li class="pull-left"> 
					<div class="btn-group bootstrap-select show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default btn-sm" data-toggle="dropdown" role="button" data-id="taxType" title="CGST/SGST"><span class="filter-option pull-left">CGST/SGST</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">CGST/SGST</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">IGST</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="taxtype" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" id="taxType" tabindex="-98">
<option value="" selected="selected">CGST/SGST</option>
<option value="igst">IGST</option>
</select></div>
				</li>

								<li class="pull-right">
					<div class="btn-group bootstrap-select show-menu-arrow text-success fit-width"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default btn-sm" data-toggle="dropdown" role="button" data-id="selectCashier" title="Select Cashier"><span class="filter-option pull-left">Select Cashier</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select Cashier</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="cashier" class="selectpicker show-menu-arrow text-success" data-style="btn-default btn-sm" data-width="fit" id="selectCashier" tabindex="-98">
<option value="" selected="selected">Select Cashier</option>
</select></div>
				</li>
							</ul>
		</div>

		<div class="panel-body form-group">
			<ul>
							<li class="pull-left first_li">
					<label class="control-label">Register Mode</label>
				</li>
				<li class="pull-left">
					<div class="btn-group bootstrap-select show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" title="Sales Receipt"><span class="filter-option pull-left">Sales Receipt</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Sales Receipt</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="mode" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98">
<option value="sale" selected="selected">Sales Receipt</option>
</select></div>
				</li>
				

									<li class="pull-left">
						<label class="control-label">Stock Location</label>
					</li>
					<li class="pull-left">
						<div class="btn-group bootstrap-select show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" title="LaxyoHouse"><span class="filter-option pull-left">LaxyoHouse</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">LaxyoHouse</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Indraprastha</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Annapurna</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Mahalaxmi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Ratlam</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bapat</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Shop114</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">AirportRoad</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">NewArrival</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Unchecked</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Damaged</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Scrap</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="stock_location" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98">
<option value="4">LaxyoHouse</option>
<option value="6">Indraprastha</option>
<option value="8">Annapurna</option>
<option value="11">Mahalaxmi</option>
<option value="13">Ratlam</option>
<option value="16">Bapat</option>
<option value="20">Shop114</option>
<option value="22">AirportRoad</option>
<option value="27">NewArrival</option>
<option value="28">Unchecked</option>
<option value="29">Damaged</option>
<option value="30">Scrap</option>
</select></div>
					</li>
				
				<!-- <li class="pull-right">
					<button class='btn btn-default btn-sm modal-dlg' id='show_suspended_sales_button' data-href=''
							title=''>
						<span class="glyphicon glyphicon-align-justify">&nbsp</span>					</button>
				</li> -->

									<li class="pull-right">
						<a href="http://newpos.dbfindia.com/sales/manage" class="btn btn-primary btn-sm" id="sales_takings_button" title="Daily Sales"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Daily Sales</a>					</li>
							</ul>
		</div>
	</form>
	
		<form action="http://newpos.dbfindia.com/sales/add" id="add_item_form" class="form-horizontal panel panel-default sPanel2" method="post" accept-charset="utf-8">
                                                               <input type="hidden" name="csrf_ospos_v3" value="945dcb93d398b03dd76b7b36d017e504">
		<div class="panel-body form-group sPanel2">
			<ul>
				<li class="pull-left first_li">
					<label for="item" class="control-label">Find or Scan Item or Receipt</label>
				</li>
				<li class="pull-left">
					<input type="text" name="item" value="" id="item" class="form-control input-sm ui-autocomplete-input" size="50" tabindex="1" autocomplete="off">
					<span class="ui-helper-hidden-accessible" role="status"></span>
				</li>

				<span id="lock_bill" class="btn btn-sm btn-danger glyphicon glyphicon-lock pull-right animated pulse infinite" title="Lock Bill"></span>

				<!-- <li class="pull-right">
					<button id='new_item_button' class='btn btn-info btn-sm pull-right modal-dlg' data-btn-new='' data-btn-submit='' data-href=''
							title=''>
						<span class="glyphicon glyphicon-tag">&nbsp</span>					</button>
				</li> -->
			
			</ul>
		</div>
	</form>

<!-- Sale Items List -->

	<table class="sales_table_100" id="register">
		<thead>
			<tr>
				<th style="width: 5%;">Delete</th>
				<th style="width: 15%;">Item #</th>
				<th style="width: 35%;">Item Name</th>
				<th style="width: 10%;">Price</th>
				<th style="width: 10%;">Quantity</th>
				<th style="width: 10%;">Disc %</th>
				<th style="width: 10%;">Total</th>
				<!-- <th style="width: 5%;"></th> -->
			</tr>
		</thead>

		<tbody id="cart_contents">								
							<tr>
					<td colspan="8">
						<div class="alert alert-dismissible alert-info">There are no Items in the cart.</div>
					</td>
				</tr>
					</tbody>
	</table>
</div>

<!-- Overall Sale -->
<div id="overall_sale" class="panel panel-default">
	<div class="panel-body">
		<section>
					</section>
		<form action="http://newpos.dbfindia.com/sales/select_customer" id="select_customer_form" class="form-horizontal" method="post" accept-charset="utf-8">
                                                          <input type="hidden" name="csrf_ospos_v3" value="945dcb93d398b03dd76b7b36d017e504">
												<div class="form-group" id="select_customer">
						<label id="customer_label" for="customer" class="control-label" style="margin-bottom: 1em; margin-top: -1em;">Select Customer</label>
						<input type="text" name="customer" value="Start typing customer details..." id="customer" class="form-control input-sm ui-autocomplete-input" autocomplete="off">

						<button class="btn btn-info btn-sm modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/customers/view" title="New Customer">
							<span class="glyphicon glyphicon-user">&nbsp;</span>New Customer						</button>
					</div>
				
					</form>
		<table class="sales_table_100" id="sale_totals">
			<tbody><tr>
				<th style="width: 55%;">Quantity of 0 Items</th>
				<th style="width: 45%; text-align: right;">0</th>
			</tr>
			<tr>
				<th style="width: 55%;">Subtotal</th>
				<th style="width: 45%; text-align: right;">₹&nbsp;0</th>
			</tr>

			
			<tr>
				<th style="width: 55%;">Total</th>
				<th style="width: 45%; text-align: right;"><span id="sale_total">₹&nbsp;0</span></th>
			</tr>
		</tbody></table>

			</div>
</div>

<script type="text/javascript">

const handle_voucher_input = () => {
	let vc_type = $('#vc_type').val();
	let vc_input = $('#vc_input').val();

	console.log('vc_type', vc_type);
	console.log('vc_input', vc_input);

	if(vc_type != "" && vc_input != ""){
		$.post('http://newpos.dbfindia.com/sales/handle_voucher_input', 
		{
			'vc_type': vc_type,
			'vc_code': vc_input
		},
		function(data) {
			alert(data);
			window.location.href = "sales";
	  	});
	}else{
		alert('Select VC_TYPE & Enter VC_CODE');
	}
  
}

$(document).ready(function()
{
	$('#item').keydown(function (e) {
		if('sale' == 'return'){
			if (e.keyCode == 13) {
				e.preventDefault();
				return false;
				}
		}
	});	

			$.post('http://newpos.dbfindia.com/sales/set_invoice_number_enabled', {sales_invoice_number_enabled: true});
		$.post('http://newpos.dbfindia.com/sales/set_invoice_number', {sales_invoice_number: $('#sales_invoice_number').val()});

					// $('#sales_invoice_number').keyup(function()
			// {
			// 	$.post("", {sales_invoice_number: $('#sales_invoice_number').val()});
			// });
		
		console.log('Invoicing Enabled');
	
	
	$('#selectCashier').on('change', function(){
		var cashier_id = $(this).val();
		var webkey = prompt("Enter your secure webkey:");

		$.post('http://newpos.dbfindia.com/sales/cashier_auth', {'cashier_id': cashier_id, 'webkey': webkey}, function(data) {
				if(data == "success")
				{
					$.post('http://newpos.dbfindia.com/sales/set_cashier', {'cashier_id': cashier_id});
					window.location.href = "sales";
				}
				else
				{
					alert("Incorrect Webkey");
				}
      });
	});

	$('#lock_bill').on('click', function(){
		
					alert('Either Customer/Cashier not added');
		  });

	$('#try_voucher_code').on('click', function(){
		$('#vc_message').html('processing...');
		var vc_code = $('#vc_input').val();
		$.post('http://newpos.dbfindia.com/sales/try_voucher_code', {'vc_code': vc_code}, function(data) {
			alert(data);
			window.location.href = "sales";
		});
	});

  $('#billType').on('change', function(){
    var type = $(this).val();
		$.post('http://newpos.dbfindia.com/sales/set_billing_type', {'type': type}, function(data) {
			window.location.href = "sales";
		});
  });

	$('#taxType').on('change', function(){
    var type = $(this).val();
    $.post('http://newpos.dbfindia.com/sales/set_taxing_type', {'type': type}, function(data) {
			window.location.href = "sales";
		});
  });

	$('#franchise_select').on('change', function(){
    var customer_id = $(this).val();
    $.post('http://newpos.dbfindia.com/sales/set_franchise_customer', {'customer_id': customer_id}, function(data) {
			window.location.href = "sales";
		});
  });

	$('#add_credit_note_payment').on('click', function(){
		$(this).hide();
	  $.post('http://newpos.dbfindia.com/sales/add_credit_note_payment', {}, function(data) {
			window.location.href = "sales";
  	});
	});

	// THIS CODE ADDS UP A DYNAMIC AMT AS PAYMENT (SPECIAL VOUCHER)
	// $('#add_special_voucher_payment').on('click', function(){
	// 		// 		$(this).hide();
	// 	  $.post('', {}, function(data) {
	// 			window.location.href = "sales";
	//   	});
	// 		// });


	$("#item").autocomplete(
	{
		source: 'http://newpos.dbfindia.com/sales/item_search',
		minChars: 0,
		autoFocus: false,
		delay: 500,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#add_item_form").submit();
			return false;
		}
	});

	$('#item').focus();

	$('#item').keypress(function (e) {
		if(e.which == 13) {
			$('#add_item_form').submit();
			return false;
		}
	});

	$('#item').blur(function()
	{
		$(this).val("Start typing Item Name or scan Barcode...");
	});

	var clear_fields = function()
	{
		if($(this).val().match("Start typing Item Name or scan Barcode...|Start typing customer details..."))
		{
			$(this).val('');
		}
	};

	$("#customer").autocomplete(
	{
		source: 'http://newpos.dbfindia.com/customers/suggest',
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#select_customer_form").submit();
		}
	});

	$('#item, #customer').click(clear_fields).dblclick(function(event)
	{
		$(this).autocomplete("search");
	});

	$('#customer').blur(function()
	{
		$(this).val("Start typing customer details...");
	});

	$(".giftcard-input").autocomplete(
	{
		source: 'http://newpos.dbfindia.com/giftcards/suggest',
		minChars: 0,
		delay: 10,
		select: function (a, ui) {
			$(this).val(ui.item.value);
			$("#add_payment_form").submit();
		}
	});

	$('#comment').keyup(function()
	{
		$.post('http://newpos.dbfindia.com/sales/set_comment', {comment: $('#comment').val()});
	});

	$("#sales_print_after_sale").change(function()
	{
		$.post('http://newpos.dbfindia.com/sales/set_print_after_sale', {sales_print_after_sale: $(this).is(":checked")});
	});

	$("#price_work_orders").change(function()
	{
		$.post('http://newpos.dbfindia.com/sales/set_price_work_orders', {price_work_orders: $(this).is(":checked")});
	});

	$('#email_receipt').change(function()
	{
		$.post('http://newpos.dbfindia.com/sales/set_email_receipt', {email_receipt: $(this).is(":checked")});
	});

	$("#finish_sale_button").click(function()
	{
		amount_due = $('#sale_amount_due').text();
		if(amount_due.charAt(0)=='-'){
			alert('Amount Due must be 0 or more.');
			return False;
		}
					$('#buttons_form').attr('action', 'http://newpos.dbfindia.com/sales/complete');
			$('#buttons_form').submit();
			});
	
	$("#finish_invoice_quote_button").click(function()
	{
		$('#buttons_form').attr('action', 'http://newpos.dbfindia.com/sales/complete');
		$('#buttons_form').submit();
	});

	$("#suspend_sale_button").click(function()
	{
		alert('Unauthorized Action');
		//$('#buttons_form').attr('action', '');
		//$('#buttons_form').submit();
	});

	$("#cancel_sale_button").click(function()
	{
		if(confirm('Are you sure you want to clear this sale? All items will cleared.'))
		{
			$('#buttons_form').attr('action', 'http://newpos.dbfindia.com/sales/cancel');
			$('#buttons_form').submit();
		}
	});

	$("#add_payment_button").click(function()
	{
		
					alert('Either Customer/Cashier not added or Bill Unlocked');
					
	});

	$("#payment_types").change(check_payment_type).ready(check_payment_type);

	$("#cart_contents input").keypress(function(event)
	{
		if(event.which == 13)
		{
			$(this).parents("tr").prevAll("form:first").submit();
		}
	});

//Not allow minus if sale mode is sale
$("#amount_tendered").keypress(function(event)
	{
	
		$(this).keypress(function(event)	{
			sale_mode = $('#sale_mode').val();
			if(sale_mode == 'sale'){
					sale_mode = $('#sale_mode').val();
						if(event.which == 45)
						{
							return false;
						}
			}
	});
		
		if(event.which == 13)
		{
			$('#add_payment_form').submit();
		}
	});

	// $("#finish_sale_button").keypress(function(event)
	// {
	// 	if(event.which == 13)
	// 	{
	// 		$('#finish_sale_form').submit();
	// 	}
	// });

	dialog_support.init("a.modal-dlg, button.modal-dlg");

	table_support.handle_submit = function(resource, response, stay_open)
	{
		$.notify(response.message, { type: response.success ? 'success' : 'danger'} );

		if(response.success)
		{
			if(resource.match(/customers$/))
			{
				$("#customer").val(response.id);
				$("#select_customer_form").submit();
			}
			else
			{
				var $stock_location = $("select[name='stock_location']").val();
				$("#item_location").val($stock_location);
				$("#item").val(response.id);
				if(stay_open)
				{
					$("#add_item_form").ajaxSubmit();
				}
				else
				{
					$("#add_item_form").submit();
				}
			}
		}
	}

	$('[name="price"],[name="quantity"],[name="discount"],[name="description"],[name="serialnumber"],[name="discounted_total"]').change(function() {
		$(this).parents("tr").prevAll("form:first").submit()
	});
});

function check_payment_type()
{
	var cash_rounding = "0";

	if($("#payment_types").val() == "Gift Card")
	{
		$("#sale_total").html("₹ 0");
		$("#sale_amount_due").html("₹ 0");
		$("#amount_tendered_label").html("Gift Card Number");
		$("#amount_tendered:enabled").val('').focus();
		$(".giftcard-input").attr('disabled', false);
		$(".non-giftcard-input").attr('disabled', true);
		$(".giftcard-input:enabled").val('').focus();
	}
	else if($("#payment_types").val() == "Cash" && cash_rounding)
	{
		$("#sale_total").html("₹ 0");
		$("#sale_amount_due").html("₹ 0");
		$("#amount_tendered_label").html("Amount Tendered");
		$("#amount_tendered:enabled").val('0');
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
	else
	{
		$("#sale_total").html("₹ 0");
		$("#sale_amount_due").html("₹ 0");
		$("#amount_tendered_label").html("Amount Tendered");
		$("#amount_tendered:enabled").val('0');
		$(".giftcard-input").attr('disabled', true);
		$(".non-giftcard-input").attr('disabled', false);
	}
}
</script>

		</div>
	</div>

	<div id="footer">
		<!-- <div class="jumbotron push-spaces"> -->
			<!-- <strong>  			 - </strong>.
						<a href="https://github.com/jekkos/opensourcepos" target="_blank"></a>
			 -->
		<!-- </div> -->
	</div>


</div><ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span><ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-2" tabindex="0" style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span></body></html>

@endsection
