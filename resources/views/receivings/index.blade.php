@extends('layouts.dbf')

@section('content')
				<div class="container">
		<div class="row">

<div id="register_wrapper">
<!-- Top register controls -->

		<button class="btn btn-sm btn-primary pull-left modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/receivings/quick_transfer" title="Quick Excel Stock Transfer">
			Quick Transfer
		</button>
		
		<!----<button id="transfer_status" class="btn btn-sm btn-default pull-left modal-dlg-wide", data-href=''
		title='Pending Transfers'>
			Pending Transfers
		</button> -->

		<!----<button id="challan_list" class="btn btn-sm btn-danger pull-right modal-dlg-wide", data-href=''
		title='Challan List'>
			Transfer Log
		</button> -->

		<a href="http://newpos.dbfindia.com/receivings/view_transfer_manager" id="transfer_manager" class="btn btn-sm btn-info pull-right" target="_blank" title="Transfer Manager">
			Manage Transfer</a>

		<button style="margin-right: 7px;" class="btn btn-sm btn-info pull-right hit_rmv_btn">Remove</button>	
		
		<a style="display: none; margin-right: 7px;" href="" id="rmv_out" class="btn btn-sm btn-info pull-right" title="Remove All Out Of Stocks">
			Remove</a>
		
		<a style="display: none; margin-right: 7px;" href="http://newpos.dbfindia.com/receivings/all_delete_item_view" id="reload_btn" class="btn btn-sm btn-info pull-right" title="Remove All Out Of Stocks">
		Remove</a>

			
	<br><br>

	<form action="http://newpos.dbfindia.com/receivings/change_mode" id="mode_form" class="form-horizontal panel panel-default" method="post" accept-charset="utf-8">
         <input type="hidden" name="csrf_ospos_v3" value="c53c8c62784376573ff6285fc2162f18">
		<div class="panel-body form-group">
			<ul>
				<li class="pull-right">
					<div class="btn-group bootstrap-select show-menu-arrow text-success fit-width"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default btn-sm" data-toggle="dropdown" role="button" data-id="selectDispatcher" title="Select Dispatcher"><span class="filter-option pull-left">Select Dispatcher</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select Dispatcher</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="dispatchers" class="selectpicker show-menu-arrow text-success" data-style="btn-default btn-sm" data-width="fit" id="selectDispatcher" tabindex="-98">
<option value="" selected="selected">Select Dispatcher</option>
</select></div>
				</li>
				<li class="pull-left first_li">
					<label class="control-label">Receiving Mode</label>
				</li>
				<li class="pull-left">
					<div class="btn-group bootstrap-select show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" title="Requisition"><span class="filter-option pull-left">Requisition</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Requisition</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="mode" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98">
<option value="requisition" selected="selected">Requisition</option>
</select></div>
									</li>

				
					
<input type="hidden" name="stock_source" value="all">

										<li class="pull-left">
						<label class="control-label">Stock Destination</label>
					</li>
					<li class="pull-left">
						<div class="btn-group bootstrap-select show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" title="LaxyoHouse"><span class="filter-option pull-left">LaxyoHouse</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">LaxyoHouse</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Indraprastha</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Annapurna</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Mahalaxmi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Ratlam</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bapat</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Shop114</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">AirportRoad</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">NewArrival</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Unchecked</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Damaged</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Scrap</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="stock_destination" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98">
<option value="4" selected="selected">LaxyoHouse</option>
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
					
			</ul>
		</div>
	</form>
	<form action="http://newpos.dbfindia.com/receivings/add" id="add_item_form" class="form-horizontal panel panel-default" method="post" accept-charset="utf-8">
            <input type="hidden" name="csrf_ospos_v3" value="c53c8c62784376573ff6285fc2162f18">
		<div class="panel-body form-group">
			<ul>
				<li class="pull-left first_li">
					<label for="item" ,="" class="control-label">
													Find or Scan Item									
					</label>
				</li>
				<li class="pull-left">
				
				<input type="text" name="item" value="Start typing Item Name or scan Barcode..." id="item" class="form-control input-sm ui-autocomplete-input" size="50" tabindex="1" autocomplete="off">
				</li>
				<!-- Add New Item Button Removed -->
				<li class="pull-right" style="font-weight:bold; font-size:1.2em">
					Total Qty: 0				</li>
			</ul>
		</div>
	</form>	
	
<!-- Receiving Items List -->

	<table class="sales_table_100" id="register">
		<thead>
			<tr>
				<th style="width:5%;">Delete</th>
				<th style="width:15%;">Barcode</th>
				<th style="width:45%;">Item Name</th>
				<th style="width:10%;">Cost</th>
				<th style="width:10%;">Qty.</th>
				<th style="width:5%;"></th>
				<!-- <th style="width:10%;"></th> -->
				<th style="width:10%;">Total</th>
				<!-- <th style="width:5%;"></th> -->
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

<!-- Overall Receiving -->

<div id="overall_sale" class="panel panel-default">
	<div class="panel-body">
		
		<table class="sales_table_100" id="sale_totals">
			<tbody><tr>
									<th style="width: 55%;"></th>
					<th style="width: 45%; text-align: right;"></th>
							</tr>
		</tbody></table>

			</div>
</div>
<input type="hidden" value="" name="rmv_id[]" id="rmv_id">

<script type="text/javascript">

$(document).ready(function(){
	$('.hit_rmv_btn').hover(function(){
		var ids =  $('#rmv_id').val();
	
		if(ids == ''){
			$('.hit_rmv_btn').attr("disabled", 'disabled');
		}
		else{
			$('.hit_rmv_btn').attr("disabled", false);	
		}
		$('#rmv_out').attr('href','http://newpos.dbfindia.com/receivings/all_delete_item/?id='+ids);
	});
})

$(document).on('click','.hit_rmv_btn',function(){
		$('#rmv_out')[0].click();
	setTimeout(function() {
	    $('#reload_btn')[0].click();
	}, 4e3);	
})

$(document).ready(function()
{
	$("#item").autocomplete(
	{
	source: 'http://newpos.dbfindia.com/receivings/stock_item_search',
		minChars:0,
			delay:10,
			autoFocus: false,
	select:	function (a, ui) {
		$(this).val(ui.item.value);
		$("#add_item_form").submit();
		return false;
	}
	});

	$('#selectDispatcher').on('change', function(){
		var dispatcher_id = $(this).val();
		var webkey = prompt("Enter your secure webkey:");

		$.post('http://newpos.dbfindia.com/receivings/dispatcher_auth', {'dispatcher_id': dispatcher_id, 'webkey': webkey}, function(data) {
			if(data == "success")
			{
				$.post('http://newpos.dbfindia.com/receivings/set_dispatcher', {'dispatcher_id': dispatcher_id});
				window.location.href = "receivings";
			}
			else
			{
				alert("Incorrect Webkey");
			}
    });
	});

	$('#item').focus();

	$('#item').keypress(function (e) {
		if (e.which == 13) {
			$('#add_item_form').submit();
			return false;
		}
	});

	$('#item').blur(function()
    {
    	$(this).attr('value',"Start typing Item Name or scan Barcode...");
    });

	$('#comment').keyup(function() 
	{
		$.post('http://newpos.dbfindia.com/receivings/set_comment', {comment: $('#comment').val()});
	});

	$('#recv_reference').keyup(function() 
	{
		$.post('http://newpos.dbfindia.com/receivings/set_reference', {recv_reference: $('#recv_reference').val()});
	});

	$("#recv_print_after_sale").change(function()
	{
		$.post('http://newpos.dbfindia.com/receivings/set_print_after_sale', {recv_print_after_sale: $(this).is(":checked")});
	});

	$('#item').click(function()
    {
    	$(this).attr('value','');
    });

	// $('#item,#supplier').click(function()
    // {
    // 	$(this).attr('value','');
    // });

  //   $("#supplier").autocomplete(
  //   {
	// 	source: '',
  //   	minChars:0,
  //   	delay:10,
	// 	select: function (a, ui) {
	// 		$(this).val(ui.item.value);
	// 		$("#select_supplier_form").submit();
	// 	}
  //   });

	dialog_support.init("button.modal-dlg, button.modal-dlg-wide");

		// $('#supplier').blur(function()
    // {
    // 	$(this).attr('value',"");
    // });

    $("#finish_receiving_button").click(function()
    {
			error = 0;
			total = 0;
			if(error != 0){
					alert( error +' out of '+total+' Stock is not available.');
			}else{

						
						alert('Please select a Dispatcher');
						

			}	 
    });

    $("#cancel_receiving_button").click(function()
    {
    	if (confirm('Are you sure you want to clear this receiving? All items will cleared.'))
    	{
			$('#finish_receiving_form').attr('action', 'http://newpos.dbfindia.com/receivings/cancel_receiving');
    		$('#finish_receiving_form').submit();
    	}
    });

	$("#cart_contents input").keypress(function(event)
	{
		if (event.which == 13)
		{
			$(this).parents("tr").prevAll("form:first").submit();
		}
	});

	table_support.handle_submit = function(resource, response, stay_open)
	{
		if(response.success)
		{
			if (resource.match(/suppliers$/))
			{
				$("#supplier").attr("value",response.id);
				$("#select_supplier_form").submit();
			}
			else
			{
				$("#item").attr("value",response.id);
				if (stay_open)
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

	$('[name="price"],[name="quantity"],[name="discount"],[name="description"],[name="serialnumber"]').change(function() {
		$(this).parents("tr").prevAll("form:first").submit()
	});

});

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


</div><ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span></body></html>
@endsection
