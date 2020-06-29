@extends('layouts.dbf')
@section('content')
<div class="container">
   <div class="row">
      <input type="hidden" id="sale_mode" value="sale">
      <div id="register_wrapper">
         <!-- Top register controls -->
         <form action="http://newpos.dbfindia.com/sales/change_mode" id="mode_form" class="form-horizontal panel panel-default sPanel1" method="post" accept-charset="utf-8">
            <div class="col-md-10">
               <span class="successMsg" id="successMsg"></span>
            </div>
            <div class="panel-body form-group sPanel1">
               <ul>
                  <li class="pull-left">
                     <div>
                        <select name="taxtype" id="taxType">
                           <option value="cgst_sgst" selected="selected">CGST/SGST</option>
                           <option value="igst">IGST</option>
                        </select>
                     </div>
                  </li>
                  <li class="pull-right">
                     <div>
                        <select id="selectCashier">
                           <option >Select Cashier</option>
                           @foreach($cashier as $value)
                           <option value="{{$value->id}}" selected="selected">{{$value->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="panel-body form-group">
               <ul>
                  @if(session('item'))
                  @else
                  <li class="pull-left first_li">
                     <label class="control-label">Register Mode</label>
                  </li>
                  <li class="pull-left">
                     <div class="btn-group bootstrap-select show-menu-arrow fit-width">
                        <button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" title="Sales Receipt"><span class="filter-option pull-left">Sales Receipt</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
                        <div class="dropdown-menu open" role="combobox">
                           <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                              <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Sales Receipt</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                           </ul>
                        </div>
                        <select name="mode" onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98">
                           <option value="sale" selected="selected">Sales Receipt</option>
                        </select>
                     </div>
                  </li>
                  @endif
                  <li class="pull-left">
                     <label class="control-label">Stock Location</label>
                  </li>
                  <li class="pull-left">
                     <div>
                        <select name="stock_location"{{--  onchange="$('#mode_form').submit();" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98" --}} id="stock_location">
                        <?php foreach ($shop as  $value) { ?>
                        <option value="{{$value->id}}" selected="selected">{{$value->shop_name}}</option>
                        <?php } ?>
                        </select>
                     </div>
                  </li>
                  <li class="pull-right">
                     <a href="{{route('sales-manage.index')}}" class="btn btn-primary btn-sm" id="sales_takings_button" title="Daily Sales"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Daily Sales</a>              
                  </li>
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
                     <div id="itemList"></div>
                  </li>
                  <span id="lock_bill" class="btn btn-sm btn-danger glyphicon glyphicon-lock pull-right animated pulse infinite" title="Lock Bill" selected="selected">
                  <input type="hidden" name="lock_bill" value="lock_bill" id="lock_bill1">
                  </span>
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
                     @include('sales.sales-items-display')
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- Overall Sale -->
      <div id="overall_sale" class="panel panel-default">
         <div class="panel-body">
            <section></section>
            @if(session('cartCustomer'))
            @else
            <div class="form-group" id="select_customer">
               <label id="customer_label" for="customer" class="control-label" style="margin-bottom: 1em; margin-top: -1em;">Select Customer</label>
               <input type="text" name="customer" value="Start typing customer details..." id="customer" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               <div id="customerList"></div>
               <div class="hide_button">
                  <button class="btn btn-info btn-sm modal-dlg" title="New Customer" data-toggle="modal" data-target="#addCustomer">
                  <span class="glyphicon glyphicon-user">&nbsp;</span>New Customer</button>
               </div>
            </div>
            @endif    
            @include('sales.customer-display')
            <p id="customer_cert"></p>
            @if(session('item'))
            <table class="sales_table_100" id="sale_totals">
               <tbody>
                  <tr>
                     <th style="width: 55%;">Quantity of <?php $itemsum = 0; foreach(session('item') as $id => $sales){ $itemsum++; }?>{{ $itemsum}} Items</th>
                     <th style="width: 45%; text-align: right;"><?php $itemsum = 0; foreach(session('item') as $id => $sales){ $itemsum+= $sales['quantity']; }?>{{$itemsum}} </th>
                  </tr>
                  <tr>
                     <th style="width: 55%;" >Subtotal</th>
                     <th style="width: 45%; text-align: right;" >₹&nbsp;<?php echo $totalAmount = session()->get('totalAmount'); ?></th>
                  </tr>
                  <?php 
                     $sum = 0;
                     $itemId = '';
                     $IGST = 0;
                     $CGST = 0;
                     $SGST = 0;
                     foreach(session('item') as $id => $value){
                        $discount = json_decode($value['discounts'], true)['retail'];
                        $sum= $sum+$value['unit_price']/100*$discount;
                        $total = $sum * $value['quantity'];
                        $total1 = $sum * $value['quantity'];
                          '<span id="items_id" >'.$id.'</span>';
                        
                        foreach ($sales['ItemTax'] as  $value) {
                           if($value->name == 'CGST'){
                              $CGST+= $value->percent;    
                           }
                           if($value->name == 'SGST'){
                              $SGST+= $value->percent;   
                           }
                           if($value->name == 'IGST'){
                              $IGST+= $value->percent;   
                           }
                        
                        }
                     }
                  ?>
                  <!-- <tr class="igst_taxes">
                     <th style="width: 55%;">{{ $IGST }}% IGST</th>
                     <th style="width: 45%; text-align: right;">₹&nbsp; <?php echo $IGST = $totalAmount/100*$IGST; ?></th>
                  </tr> -->
                  <div >
                     <tr class="gst_taxess">
                        <th style="width: 55%;">{{ $CGST }}% CGST</th>
                        <th style="width: 45%; text-align: right;">₹&nbsp; <?php echo $CGST = $totalAmount/100*$CGST; ?></th>
                     </tr>
                     <tr class="gst_taxes1s">
                        <th style="width: 55%;">{{ $SGST }}% SGST </th>
                        <th style="width: 45%; text-align: right;">₹&nbsp;<?php echo $SGST = $totalAmount/100*$SGST;?></th>
                     </tr>
                  </div>
                  <tr>
                     <th style="width: 55%;">Total</th>
                     <th style="width: 45%; text-align: right;"><span>₹&nbsp;{{ $totalAmount+$CGST+$SGST }}</span></th>
                  </tr>
               </tbody>
            </table>
            <table class="sales_table_100" id="payment_totals">
               <tbody>
                  <tr>
                     <th style="width: 55%;">Payments Total</th>
                     <th style="width: 45%; text-align: right;">₹&nbsp;0</th>
                  </tr>
                  <tr>
                     <th style="width: 55%;">Amount Due</th>
                     <th style="width: 45%; text-align: right;">₹&nbsp;<span id="sale_amount_due1">{{ $totalAmount+$CGST+$SGST }}</span></th>
                  </tr>
               </tbody>
            </table>
            <div id="payment_details">
               <form action="http://newpos.dbfindia.com/sales/add_payment" id="add_payment_form" class="form-horizontal" method="post" accept-charset="utf-8">
                  <input type="hidden" name="csrf_ospos_v3" value="14516c71ad8d9820b0440dbc36bf405d">                 
                  <table class="sales_table_100">
                     <tbody>
                        <tr>
                           <td>Payment Type</td>
                           <td>
                              <div class="{{-- btn-group bootstrap-select show-menu-arrow fit-width --}}">
                                 <select name="payment_type" {{-- id="payment_types" class="selectpicker show-menu-arrow" data-style="btn-default btn-sm" data-width="fit" tabindex="-98" --}} id="payment_types">
                                 <option value="Cash">Cash</option>
                                 <option value="Debit Card">Debit Card</option>
                                 <option value="Credit Card">Credit Card</option>
                                 <option value="PayTM">PayTM</option>
                                 </select>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><span id="amount_tendered_label">Amount Tendered</span></td>
                           <td>
                              <input type="text" name="amount_tendered" value="{{ $totalAmount+$CGST+$SGST }}" id="amount_tendered1" class="form-control input-sm non-giftcard-input" size="5" tabindex="5" onclick="this.select();">
                              <input type="text" name="amount_tendered" value="{{ $totalAmount+$CGST+$SGST }}" id="amount_tendered" class="form-control input-sm giftcard-input ui-autocomplete-input" disabled="disabled" size="5" tabindex="6" autocomplete="off">
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </form>
               <div class="btn btn-sm btn-success pull-right" id="add_payment_button" onclick="add_payment_button();" tabindex="7"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>Add Payment</div>
            </div>
            <form action="" id="buttons_form" method="post" accept-charset="utf-8">
               <div class="form-group" id="buttons_sale">
                  <div class="btn btn-sm btn-danger pull-right" id="cancel_sale_button"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</div>
               </div>
            </form>
         </div>
      </div>
      @else
      <table class="sales_table_100" id="sale_totals">
         <tbody>
            <tr>
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
         </tbody>
      </table>
      @endif
   </div>
</div>

{{-- Code for add customers ......................... --}}
<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" >
            <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="bootstrap-dialog-body">
               <div class="bootstrap-dialog-message">
                  <div>
                     <div id="required_fields_message">Fields in red are required</div>
                     <ul id="error_message_box" class="error_message_box"></ul>
                     <form id="customer_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate" action="{{ route('add-customer') }}" >
                        @csrf
                        <ul class="nav nav-tabs nav-justified" data-tabs="tabs">
                           <li class="active" role="presentation">
                              <a data-toggle="tab" href="#customer_basic_info">Information</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade in active" id="customer_basic_info">
                              <fieldset>
                                 <div class="form-group form-group-sm">
                                    <label for="first_name" class="required control-label col-xs-3" aria-required="true">First Name</label>  
                                    <div class="col-xs-8">
                                       <input type="text" name="first_name" value="" id="first_name" class="form-control input-sm">
                                    </div>
                                 </div>
                                 @error('first_name')
                                 <span class="text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <div class="form-group form-group-sm">
                                    <label for="last_name" class="required control-label col-xs-3" aria-required="true">Last Name</label> 
                                    <div class="col-xs-8">
                                       <input type="text" name="last_name" value="" id="last_name" class="form-control input-sm">
                                    </div>
                                 </div>
                                 @error('last_name')
                                 <span class="text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <div class="form-group form-group-sm">
                                    <label for="gender" class="control-label col-xs-3">Gender</label> 
                                    <div class="col-xs-4">
                                       <label class="radio-inline">
                                       <input type="radio" name="gender" value="1" id="gender">
                                       M    </label>
                                       <label class="radio-inline">
                                       <input type="radio" name="gender" value="0" id="gender">
                                       F    </label>
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="email" class="control-label col-xs-3">Email</label>   
                                    <div class="col-xs-8">
                                       <div class="input-group">
                                          <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                                          <input type="text" name="email" value="" id="email" class="form-control input-sm">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="phone_number" class="required control-label col-xs-3" aria-required="true">Phone Number</label> 
                                    <div class="col-xs-8">
                                       <div class="input-group">
                                          <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                          <input type="text" name="phone_number" value="" id="phone_number" class="form-control input-sm">
                                       </div>
                                    </div>
                                 </div>
                                 @error('phone_number')
                                 <span class="text-danger" role="alert">
                                 <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                 <div class="form-group form-group-sm">
                                    <label for="address_1" class="control-label col-xs-3">Address 1</label> 
                                    <div class="col-xs-8">
                                       <input type="text" name="address_1" value="" id="address_1" class="form-control input-sm">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="address_2" class="control-label col-xs-3">Address 2</label> 
                                    <div class="col-xs-8">
                                       <input type="text" name="address_2" value="" id="address_2" class="form-control input-sm">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="city" class="control-label col-xs-3">City</label>  
                                    <div class="col-xs-8">
                                       <input type="text" name="city" value="" id="city" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="state" class="control-label col-xs-3">State</label>   
                                    <div class="col-xs-8">
                                       <input type="text" name="state" value="" id="state" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="zip" class="control-label col-xs-3">Postal Code</label>  
                                    <div class="col-xs-8">
                                       <input type="text" name="zip" value="" id="postcode" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="country" class="control-label col-xs-3">Country</label>  
                                    <div class="col-xs-8">
                                       <input type="text" name="country" value="" id="country" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="comments" class="control-label col-xs-3">Comments</label>   
                                    <div class="col-xs-8">
                                       <textarea name="comments" cols="40" rows="10" id="comments" class="form-control input-sm"></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="company_name" class="control-label col-xs-3">Company</label>               
                                    <div class="col-xs-8">
                                       <input type="text" name="company_name" value="" id="company_name" class="form-control input-sm">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="gstin" class="control-label col-xs-3">GSTIN</label>               
                                    <div class="col-xs-8">
                                       <input type="text" name="gstin" value="" id="gstin" class="form-control input-sm">
                                    </div>
                                 </div>
                                 <div class="form-group form-group-sm">
                                    <label for="account_number" class="control-label col-xs-3">Account #</label>              
                                    <div class="col-xs-4">
                                       <input type="text" name="account_number" value="" id="account_number" class="form-control input-sm">
                                    </div>
                                 </div>
                                 <input type="hidden" name="taxable" value="1">
                              </fieldset>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" id="submit">Add Customer</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $item = session('item');
   $var = array(
       'qwe' => 'asd',
       'asd' => array(
           1 => 2,
           3 => 4,
       ),
       'zxc' => 0,
   );
?>

{{-- End Code for add customers ......................... --}}
<!-- <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link> -->
<!-- <script src="jquery-3.5.1.min.js"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->
<script type="text/javascript">
   $(document).ready(function() {

    $('#selectCashier').on('change', function() {
        var cashier_id = $(this).val();
        // alert(cashier_id);
        var webkey = prompt("Enter your secure webkey:");
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('cashier_auth') }}",
            method: "POST",
            data: {
                cashier_id: cashier_id,
                webkey: webkey,
                _token: _token
            },
            success: function(data) {
                if (data == "success") {
                    $.post('http://newpos.dbfindia.com/sales/set_cashier', {
                        'cashier_id': cashier_id
                    });
                    window.location.href = "sales";
                } else {
                    alert("Incorrect Webkey");
                }
            }
        });
    });

    $('#lock_bill').on('click', function() {
        var lock_bill1 = $('#lock_bill1').val();
        $("#register_wrapper *").prop('disabled', true);
        $("#overall_sale *").prop('disabled', true);
    });

    $('#item').keyup(function() {
        var query = $(this).val();
        // alert(query);
        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('get-sale-item') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#itemList').fadeIn();
                    $('#itemList').html(data);
                }
            });
        } else {
            $('#itemList').fadeOut();
        }
    });
    $(document).on('click', '#selectLI', function() {
        $('#item').val($(this).text());
        $('#itemList').fadeOut();
        var value = $('#item').val();
        var res = value.split("|");
        var final = res[1];
        var item = 'item';
        alert(final);
        if (final != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('sales.store') }}",
                method: "POST",
                data: {
                    item_name: final,
                    item: item,
                    _token: _token
                },
                success: function(data) {
                    $('#item').val('');
                    $('#cart_contents').empty().html(data);
                    $('.load-cls').hide();
                    $('#finish_sale').show();
                    window.location.reload();
                }
            });
        }
    });
    $('#item').focus();
    $('#item').keypress(function(e) {
        if (e.which == 13) {
            $('#add_item_form').submit();
            return false;
        }
    });
    $('#item').blur(function() {
        $(this).val("Start typing Item Name or scan Barcode...");
    });
    var clear_fields = function() {
        if ($(this).val().match("Start typing Item Name or scan Barcode...|Start typing customer details...")) {
            $(this).val('');
        }
    };

    $('#customer').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('get-customer') }}",
                method: "POST",
                data: {
                    customer_name: query,
                    _token: _token
                },
                success: function(data) {
                    $('#customerList').fadeIn();
                    $('#customerList').html(data);
                }
            });
        } else {
            $('#customerList').fadeOut();
        }
    });
    $(document).on('click', '#customerList', function() {
        $('#customer').val($(this).text());
        $('#customerList').fadeOut();
        var value = $('#customer').val();
        var res = value.split("|");
        var final = res;
        var customer = 'customer';
        if (final != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('store-customer') }}",
                method: "POST",
                data: {
                    customer_name: final,
                    customer: customer,
                    _token: _token
                },
                success: function(data) {
                    $('#customer').val('');
                    $('#customer_cert').empty().html(data);
                    $('.load-cls').hide();
                    $('#finish_sale').show();
                    window.location.reload();

                    $('#select_customer').css('display', 'none');
                }
            });
        }
    });
    $('#item, #customer').click(clear_fields).dblclick(function(event) {
        $(this).autocomplete("search");
    });
    $('#customer').blur(function() {
        $(this).val("Start typing customer details...");
    });
    $(".giftcard-input").autocomplete({
        source: 'http://newpos.dbfindia.com/giftcards/suggest',
        minChars: 0,
        delay: 10,
        select: function(a, ui) {
            $(this).val(ui.item.value);
            $("#add_payment_form").submit();
        }
    });

    $("#payment_types").change(check_payment_type).ready(check_payment_type);
    $("#cart_contents input").keypress(function(event) {
        if (event.which == 13) {
            $(this).parents("tr").prevAll("form:first").submit();
        }
    });
});

function check_payment_type() {
    var cash_rounding = "0";
    if ($("#payment_types").val() == "Gift Card") {
        $("#sale_total").html("₹ 0");
        $("#sale_amount_due").html("₹ 0");
        $("#amount_tendered_label").html("Gift Card Number");
        $("#amount_tendered:enabled").val('').focus();
        $(".giftcard-input").attr('disabled', false);
        $(".non-giftcard-input").attr('disabled', true);
        $(".giftcard-input:enabled").val('').focus();
    } else if ($("#payment_types").val() == "Cash" && cash_rounding) {
        $("#sale_total").html("₹ 0");
        $("#sale_amount_due").html("₹ 0");
        $("#amount_tendered_label").html("Amount Tendered");
        $("#amount_tendered:enabled").val('0');
        $(".giftcard-input").attr('disabled', true);
        $(".non-giftcard-input").attr('disabled', false);
    } else {
        $("#sale_total").html("₹ 0");
        $("#sale_amount_due").html("₹ 0");
        $("#amount_tendered_label").html("Amount Tendered");
        $("#amount_tendered:enabled").val('0');
        $(".giftcard-input").attr('disabled', true);
        $(".non-giftcard-input").attr('disabled', false);
    }
}
</script>

<script>
   $('.load-cls').hide();
   function myFunction(id) {
      var qty = $('#chngQty'+id).val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
       url:"{{ route('updatSaleItemeQty') }}",
       method:"POST",
       data:{quantity:qty, id:id, _token:_token},
       success:function(data){
         setTimeout(function(){
            $('#loading'+id).show();
         }, 1000);
         setTimeout(function(){
            $('#loading'+id).hide();
           }, 3000);
         window.location.reload();
       }
     });
   }

   function add_payment_button(){
        var amount_tendered1 = $('#amount_tendered1').val();
        var customer_name = $('#customer_name').text();
        var sale_amount_due1 = $('#sale_amount_due1').text();
        var payment_types = $('#payment_types').val();
        var selectCashier = $('#selectCashier').val();
        var stock_location = $('#stock_location').val();
        var items_id = $('#items_id').text();
        var sgst_cght_sub_total = $('#sub_total').text();
        var igst_sub_total = $('#igst_sub_total').text();
        var customer_id = $('input#customer_id').val();
        if (customer_name == '') {
            alert('Select customer');
        } else if (selectCashier == '') {
            alert('Select Cashier');
        } else {
            $.ajax({
                method: "POST",
                url: 'sales-manage/',
                data: {
                    amount_tendered1: amount_tendered1,
                    customer_name: customer_name,
                    sale_amount_due1: sale_amount_due1,
                    payment_types: payment_types,
                    selectCashier: selectCashier,
                    stock_location: stock_location,
                    customer_id: customer_id,
                    sgst_cght_sub_total: sgst_cght_sub_total,
                    igst_sub_total: igst_sub_total
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#successMsg").html(data).delay(2000).fadeOut();
                    setTimeout(function() {}, 2000);

                }
            });
        }

        /*code for add cert items...........*/
        var data = <?php echo json_encode($item); ?> ;
        // console.log(data);
        $.each(data, function(index, value) {
            var customer_id = $('input#customer_id').val();
            var item_number = value['item_number'];
            var name = value['name'];
            var quantity = value['quantity'];
            var unit_price = value['unit_price'];
            var item_id = index;
            $.ajax({
                url: "{{ route('cert-items') }}",
                method: "POST",
                data: {
                    item_number: item_number,
                    name: name,
                    quantity: quantity,
                    unit_price: unit_price,
                    item_id: item_id,
                    customer_id: customer_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data) {
                        console.log('Cert Items added successfully')
                    } else {
                        alert('cert intem not added..');
                    }
                }
            });
            // Will stop running after "three"
            console.log(value);
            return (value !== 'one');
        });
	}
</script>
</div>
</div>
<div id="footer">
</div>
</div>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul>
<span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-2" tabindex="0" style="display: none;"></ul>
<span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
@endsection