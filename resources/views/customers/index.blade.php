@extends('layouts.dbf')

@section('content')

<div class="container">
   <div class="row">
      <div id="title_bar" class="btn-toolbar">
         <button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/customers/excel_import" title="Customer Import from Excel">
         <span class="glyphicon glyphicon-import">&nbsp;</span>Excel Import      </button>
         <button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/customers/view" title="New Customer" data-toggle="modal" data-target="#addCustomer" >
         <span class="glyphicon glyphicon-user">&nbsp;</span>New Customer  </button>
         <a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/customers/get_datatable">Data Table</a>
         <a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/manager/fetch_valid_customers_contact_no">Contact Numbers</a>

         <div class="col-xs-3 mb-2" align="center">
            <p>
              @if($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
              @endif
            </p>
        </div>
        <div class="col-xs-3 mb-2" align="center">
              
                <div class="message"> </div>
            </p>
        </div>
       
      </div>

        
       
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" >
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="bootstrap-dialog-body"><div class="bootstrap-dialog-message"><div><div id="required_fields_message">Fields in red are required</div>

               <ul id="error_message_box" class="error_message_box"></ul>

               <form id="customer_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate" action="{{ route('customers.store') }}" >
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
                        <label for="last_name" class="required control-label col-xs-3" aria-required="true">Last Name</label> <div class="col-xs-8">
                           <input type="text" name="last_name" value="" id="last_name" class="form-control input-sm">
                        </div>
                     </div>
                     @error('last_name')
                        <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                     @enderror

                     <div class="form-group form-group-sm"> 
                        <label for="gender" class="control-label col-xs-3">Gender</label> <div class="col-xs-4">
                           <label class="radio-inline">
                              <input type="radio" name="gender" value="1" id="gender">
                      M    </label>
                           <label class="radio-inline">
                              <input type="radio" name="gender" value="0" id="gender">
                      F    </label>

                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="email" class="control-label col-xs-3">Email</label>   <div class="col-xs-8">
                           <div class="input-group">
                              <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                              <input type="text" name="email" value="" id="email" class="form-control input-sm">
                           </div>
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="phone_number" class="required control-label col-xs-3" aria-required="true">Phone Number</label> <div class="col-xs-8">
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
                        <label for="address_1" class="control-label col-xs-3">Address 1</label> <div class="col-xs-8">
                           <input type="text" name="address_1" value="" id="address_1" class="form-control input-sm">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="address_2" class="control-label col-xs-3">Address 2</label> <div class="col-xs-8">
                           <input type="text" name="address_2" value="" id="address_2" class="form-control input-sm">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="city" class="control-label col-xs-3">City</label>  <div class="col-xs-8">
                           <input type="text" name="city" value="" id="city" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="state" class="control-label col-xs-3">State</label>   <div class="col-xs-8">
                           <input type="text" name="state" value="" id="state" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="zip" class="control-label col-xs-3">Postal Code</label>  <div class="col-xs-8">
                           <input type="text" name="zip" value="" id="postcode" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="country" class="control-label col-xs-3">Country</label>  <div class="col-xs-8">
                           <input type="text" name="country" value="" id="country" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                        </div>
                     </div>

                     <div class="form-group form-group-sm"> 
                        <label for="comments" class="control-label col-xs-3">Comments</label>   <div class="col-xs-8">
                           <textarea name="comments" cols="40" rows="10" id="comments" class="form-control input-sm"></textarea>
                        </div>
                     </div>

                    
                     <div class="form-group form-group-sm">
                        <label for="company_name" class="control-label col-xs-3">Company</label>               <div class="col-xs-8">
                           <input type="text" name="company_name" value="" id="company_name" class="form-control input-sm">
                        </div>
                     </div>

                     <div class="form-group form-group-sm">
                        <label for="gstin" class="control-label col-xs-3">GSTIN</label>               <div class="col-xs-8">
                           <input type="text" name="gstin" value="" id="gstin" class="form-control input-sm">
                        </div>
                     </div>

                     <div class="form-group form-group-sm">
                        <label for="account_number" class="control-label col-xs-3">Account #</label>              <div class="col-xs-4">
                           <input type="text" name="account_number" value="" id="account_number" class="form-control input-sm">
                        </div>
                     </div>  
                     <input type="hidden" name="taxable" value="1">
                           
                </fieldset>
               </div>
             </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit">Send message</button>
               </div>
            </form>
              
             </div>
            </div>
          </div>
         </div>
     
    </div>
  </div>
</div>

     <div id="table_holder">
         <div class="bootstrap-table">
            <div class="fixed-table-toolbar">
               <div class="bs-bars pull-left">
                  <div id="toolbar">
                     <div class="pull-left btn-toolbar">
                        <button id="delete" class="btn btn-default btn-sm" disabled="disabled">
                        <span class="glyphicon glyphicon-trash">&nbsp;</span>Delete</button>
                        <button id="email" class="btn btn-default btn-sm" disabled="">
                        <span class="glyphicon glyphicon-envelope">&nbsp;</span>Email</button>
                     </div>
                  </div>
               </div>
               <div class="columns columns-right btn-group pull-right">
                  <button class="btn btn-default btn-sm" type="button" name="refresh" aria-label="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
                  <div class="keep-open btn-group" title="Columns">
                     <button type="button" aria-label="columns" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
                     <ul class="dropdown-menu" role="menu">
                        <li role="menuitem"><label><input type="checkbox" data-field="people.person_id" value="1" checked="checked"> Id</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="last_name" value="2" checked="checked"> Last Name</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="first_name" value="3" checked="checked"> First Name</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="phone_number" value="4" checked="checked"> Phone Number</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="total" value="5" checked="checked"> Total Spent</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="created_at" value="6" checked="checked"> Created At</label></li>
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
               <div class="pull-right search"><input class="form-control input-sm" type="text" placeholder="Search"></div>
            </div>
            <div class="fixed-table-container" style="padding-bottom: 0px;">
               <div class="fixed-table-header" style="display: none;">
                  <table></table>
               </div>
               <div class="table-body">
                  <div class="fixed-table-loading" style="top: 41px; display: none;">Loading, please wait...</div>
                  <div id="table-sticky-header-sticky-header-container" class="hidden"></div>
                  <div id="table-sticky-header_sticky_anchor_begin"></div>
                  <table id="myTable" class="table table-hover table-striped">
                     <thead id="table-sticky-header">
                        <tr>
                           <th class="bs-checkbox print_hide" style="width: 36px; " data-field="checkbox">
                              <div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="people.person_id">
                              <div class="th-inner sortable both desc">Id</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="last_name">
                              <div class="th-inner sortable both">Last Name</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="first_name">
                              <div class="th-inner sortable both">First Name</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="phone_number">
                              <div class="th-inner sortable both">Phone Number</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="total">
                              <div class="th-inner ">Total Spent</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="created_at">
                              <div class="th-inner sortable both">Created At</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="print_hide" style="" data-field="messages">
                              <div class="th-inner "></div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="print_hide" style="" data-field="edit">
                              <div class="th-inner "></div>
                              <div class="fht-cell"></div>
                           </th>
                        </tr>
                     </thead>
                     <div class="container">
                     <?php foreach ($data as $datas) { ?>
                     <tbody>
                        <tr data-index="0" data-uniqueid="13158">
                           <td class="bs-checkbox print_hide"><input data-index="0" name="btSelectItem" type="checkbox"></td>
                           <td class="" style="">{{$datas->id}}</td>
                           <td class="" style="">{{$datas->last_name}}</td>
                           <td class="" style="">{{$datas->first_name}}</td>
                           <td class="" style="">{{$datas->phone_number}}</td>
                           <td class="" style="">₹&nbsp;</td>
                           <td class="" style="">{{$datas->created_at}}</td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/Messages/view/13158" class="modal-dlg" data-btn-submit="Submit" title="Send SMS"><span class="glyphicon glyphicon-phone"></span></a></td>
                           <td class="print_hide" style="">
                              {{-- <a href="http://newpos.dbfindia.com/customers/view/13158" class="modal-dlg" data-btn-submit="Submit" title="Update Customer" data-toggle="modal" data-target="#editCustomer{{ $datas->id }}"><span class="glyphicon glyphicon-edit"></span></a> --}}
                               <button type="button" data-toggle="modal" data-target="#editCustomer{{ $datas->id }}" class="fa fa-pencil-square-o btn btn-primary">
                                   {{-- <i  aria-hidden="true" ></i> --}}
                                   </button>
                           </td>
                        </tr>
                       
                     

 
      <div class="modal fade" id="editCustomer{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
               <div class="col-xs-3 mb-2" align="center">
                    
                  <div class="errorMessage"> </div>
               </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <div class="modal-body">
              <div class="bootstrap-dialog-body"><div class="bootstrap-dialog-message"><div>
               <div id="required_fields_message">Fields in red are required</div>

               <ul id="error_message_box" class="error_message_box"></ul>

               <form action="{{route('customers.update',$datas->id)}}" id="customer_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
                @csrf
                @method('PUT')                                                                          ">
               <ul class="nav nav-tabs nav-justified" data-tabs="tabs">
                  <li class="active" role="presentation">
                     <a data-toggle="tab" href="#customer_basic_info">Information</a>
                  </li>
                           <li role="presentation">
                        <a data-toggle="tab" href="#customer_stats_info">Stats</a>
                     </li>
               </ul>

               <div class="tab-content">
                  <div class="tab-pane fade in active" id="customer_basic_info">
                     <fieldset>
                        <div class="form-group form-group-sm"> 
               <label for="first_name" class="required control-label col-sm-3" aria-required="true">First Name</label>  <div class="col-xs-8">
                  <input type="text" name="first_name" value="{{ $datas->first_name}}" id="first_name" class="form-control input-sm">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="last_name" class="required control-label col-xs-3" aria-required="true">Last Name</label> <div class="col-xs-8">
                  <input type="text" name="last_name" value="{{ $datas->last_name}}" id="last_name" class="form-control input-sm">
               </div>
            </div>

           <div class="form-group form-group-sm"> 
               <label for="gender" class="control-label col-xs-3" >Gender</label> <div class="col-xs-8">
                  
                  <div class="col-xs-4">
                     <label class="radio-inline">Male</label>
                     <input type ="radio" name="gender" value="male" id="gender" class="form-control input-sm" <?php if ($datas->gender == "male") echo "checked"; ?>>
                  </div>
                  <div class="col-xs-4">
                     <label class="radio-inline">Female</label>
                     <input type ="radio" name="gender" value="female" id="gender" class="form-control input-sm" <?php if ($datas->gender == "female") echo "checked"; ?>>
                  </div>
               </div>
            </div>
            <div class="form-group form-group-sm"> 

              {{--  <label for="gender" class="control-label col-xs-3">Gender</label> --}} 
               {{-- <div class="col-xs-4">
                  <label class="radio-inline">
                     <input type="radio" name="gender" value="{{ $datas->gender}}" id="gender">
             M    </label>
                  <label class="radio-inline">
                     <input type="radio" name="gender" value="{{ $datas->gender}}" id="gender">
             F    </label>

               </div> --}}
            </div>

            <div class="form-group form-group-sm"> 
               <label for="email" class="control-label col-xs-3">Email</label>   <div class="col-xs-8">
                  <div class="input-group">
                     <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                     <input type="text" name="email" value="{{ $datas->gender}}" id="email" class="form-control input-sm">
                  </div>
               </div>
            </div>
            <div class="form-group form-group-sm"> 
               <label for="phone_number" class="required control-label col-xs-3" aria-required="true">Phone Number</label> <div class="col-xs-8">
                  <div class="input-group">
                     <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                     <input type="text" name="phone_number" value="{{ $datas->phone_number}}" id="phone_number" class="form-control input-sm">
                  </div>
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="address_1" class="control-label col-xs-3">Address 1</label> 
               <div class="col-xs-8">
                  <input type="text" name="address_1" value="{{ $datas->address_1}}" id="address_1" class="form-control input-sm">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="address_2" class="control-label col-xs-3">Address 2</label> 
               <div class="col-xs-8">
                  <input type="text" name="address_2" value="{{ $datas->address_2}}" id="address_2" class="form-control input-sm">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="city" class="control-label col-xs-3">City</label>  
               <div class="col-xs-8">
                  <input type="text" name="city" value="{{ $datas->city}}" id="city" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="state" class="control-label col-xs-3">State</label>   
               <div class="col-xs-8">
                  <input type="text" name="state" value="{{ $datas->state}}" id="state" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="zip" class="control-label col-xs-3">Postal Code</label>  
               <div class="col-xs-8">
                  <input type="text" name="zip" value="{{ $datas->postcode}}" id="postcode" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="country" class="control-label col-xs-3">Country</label>  
               <div class="col-xs-8">
                  <input type="text" name="country" value="{{ $datas->country}}" id="country" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div>

            <div class="form-group form-group-sm"> 
               <label for="comments" class="control-label col-xs-3">Comments</label>   
               <div class="col-xs-8">
                  <textarea name="comments" cols="40" rows="10" id="comments" class="form-control input-sm" value="{{ $datas->comments}}" >{{ $datas->comments}}</textarea>
               </div>
            </div>


            <div class="form-group form-group-sm">
               <label for="company_name" class="control-label col-xs-3">Company</label>               
               <div class="col-xs-8">
                  <input type="text" name="company_name" value="{{ $datas->company_name}}" id="company_name" class="form-control input-sm">
               </div>
            </div>

            <div class="form-group form-group-sm">
               <label for="gstin" class="control-label col-xs-3">GSTIN</label>               
               <div class="col-xs-8">
                  <input type="text" name="gstin" value="{{ $datas->gstin}}" id="gstin" class="form-control input-sm">
               </div>
            </div>

            <div class="form-group form-group-sm">
               <label for="account_number" class="control-label col-xs-3">Account #</label>              
               <div class="col-xs-4">
                  <input type="text" name="account_number" value="{{ $datas->account_number}}" id="account_number" class="form-control input-sm">
               </div>
            </div>

            <input type="hidden" name="taxable" value="1">
                        
               </fieldset>
                  </div>
                  <div class="tab-pane" id="customer_stats_info">
                  <fieldset>
                     <div class="form-group form-group-sm">
                        <label for="total" class="control-label col-xs-3">Total spent</label>                  <div class="col-xs-4">
                           <div class="input-group input-group-sm">
                                 <span class="input-group-addon input-sm"><b>₹</b></span>
                              <input type="text" name="total" value="350" id="total" class="form-control input-sm" disabled="">
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group form-group-sm">
                        <label for="max" class="control-label col-xs-3">Max. spent</label>                  <div class="col-xs-4">
                           <div class="input-group input-group-sm">
                                 <span class="input-group-addon input-sm"><b>₹</b></span>
                              <input type="text" name="max" value="350" id="max" class="form-control input-sm" disabled="">
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group form-group-sm">
                        <label for="min" class="control-label col-xs-3">Min. spent</label>                  <div class="col-xs-4">
                           <div class="input-group input-group-sm">
                                 <span class="input-group-addon input-sm"><b>₹</b></span>
                              <input type="text" name="min" value="350" id="min" class="form-control input-sm" disabled="">
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group form-group-sm">
                        <label for="average" class="control-label col-xs-3">Average spent</label>                 <div class="col-xs-4">
                           <div class="input-group input-group-sm">
                                 <span class="input-group-addon input-sm"><b>₹</b></span>
                              <input type="text" name="average" value="350" id="average" class="form-control input-sm" disabled="">
                           </div>
                        </div>
                     </div>
                     
                     <div class="form-group form-group-sm">
                        <label for="quantity" class="control-label col-xs-3">Quantity</label>                  <div class="col-xs-4">
                           <div class="input-group input-group-sm">
                              <input type="text" name="quantity" value="1" id="quantity" class="form-control input-sm" disabled="">
                           </div>
                        </div>
                     </div>

                     <div class="form-group form-group-sm">
                        <label for="avg_discount" class="control-label col-xs-3">Average discount</label>                  <div class="col-xs-3">
                           <div class="input-group input-group-sm">
                              <input type="text" name="avg_discount" value="0" id="avg_discount" class="form-control input-sm" disabled="">
                              <span class="input-group-addon input-sm"><b>%</b></span>
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </div>
             </div>

               
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitUpdate">Send message</button>
                  </div>

               </form>
                </div>
              </div>
            </div>
            </div>
            </tbody>
            <?php }?>
         </table>
               </div>
                  <div id="table-sticky-header_sticky_anchor_end"></div>
               </div>
               <div class="fixed-table-footer" style="display: none;">
                  <table>
                     <tbody>
                        <tr></tr>
                     </tbody>
                  </table>
               </div>
            </div>
           {{--  <div class="fixed-table-pagination" style="display: block;">
               <div class="pull-left pagination-detail">
                  <span class="pagination-info">Showing 1 to 20 of 13126 rows</span>
                  <span class="page-list">
                     <span class="btn-group dropup">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="page-size">20</span> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                           <li role="menuitem" class=""><a href="#">10</a></li>
                           <li role="menuitem" class=""><a href="#">25</a></li>
                           <li role="menuitem" class=""><a href="#">50</a></li>
                           <li role="menuitem" class=""><a href="#">100</a></li>
                        </ul>
                     </span>
                     rows per page
                  </span>
               </div>
               <div class="pull-right pagination">
                  <ul class="pagination pagination-sm">
                     <li class="page-item page-pre"><a class="page-link" href="#">‹</a></li>
                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item page-last-separator disabled"><a class="page-link" href="#">...</a></li>
                     <li class="page-item page-last"><a class="page-link" href="#">657</a></li>
                     <li class="page-item page-next"><a class="page-link" href="#">›</a></li>
                  </ul>
               </div>
            </div> --}}
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
{{--  <script type="text/javascript">
   //validation and submit handling
   $(document).ready(function()
   {
      // $('#discount_percent').on('change', function() {
      //    var discount_type = $(this).children("option:selected").text();
      //    $('#discount_type').val(discount_type);
      // });
      
      $('#customer_form').validate($.extend({
         submitHandler: function(form)
         {
            $(form).ajaxSubmit({
               success: function(response)
               {
                  dialog_support.hide();
                  table_support.handle_submit('http://newpos.dbfindia.com/customers', response);
               },
               dataType: 'json'
            });
         },

         rules:
         {
            first_name: "required",
            last_name: "required",
            phone_number: "required",
            email:
            {
               remote:
               {
                  url: "http://newpos.dbfindia.com/customers/ajax_check_email",
                  type: "post",
                  data: $.extend(csrf_form_base(),
                  {
                     "person_id" : "",
                     // email is posted by default
                  })
               }
            },
            account_number:
            {
               remote:
               {
                  url: "http://newpos.dbfindia.com/customers/ajax_check_account_number",
                  type: "post",
                  data: $.extend(csrf_form_base(),
                  {
                     "person_id" : ""
                     // account_number is posted by default
                  })
               }
            }
            },

         messages: 
         {
            first_name: "First Name is a required field.",
            last_name: "Last Name is a required field.",
            email: "Email Address is already present in the database.",
            account_number: "Account Number is already present in the database."
         }
      }, form_support.error));
   });

   $("input[name='sales_tax_code_name']").change(function() {
       if( ! $("input[name='sales_tax_code_name']").val() ) {
           $("input[name='sales_tax_code']").val('');
       }
   });

   var fill_value = function(event, ui) {
       event.preventDefault();
       $("input[name='sales_tax_code']").val(ui.item.value);
       $("input[name='sales_tax_code_name']").val(ui.item.label);
   };

   $("#sales_tax_code_name").autocomplete({
       source: 'http://newpos.dbfindia.com/taxes/suggest_sales_tax_codes',
       minChars: 0,
       delay: 15,
       cacheLength: 1,
       appendTo: '.modal-content',
       select: fill_value,
       focus: fill_value
   });
</script>
<script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
nominatim.init({
   fields : {
      postcode : {
         dependencies :  ["postcode", "city", "state", "country"],
         response : {
            field : 'postalcode',
            format: ["postcode", "village|town|hamlet|city_district|city", "state", "country"]
         }
      },

      city : {
         dependencies :  ["postcode", "city", "state", "country"],
         response : {
            format: ["postcode", "village|town|hamlet|city_district|city", "state", "country"]
         }
      },

      state : {
         dependencies :  ["state", "country"]
      },

      country : {
         dependencies :  ["state", "country"]
      }
   },
   language : 'en-US',
   country_codes: 'IN'
});
});
</script> --}}<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script type="text/javascript">
   
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script type="text/javascript">

   $(document).ready(function(){
      $("#submit").click(function(){

         first_name = $('#first_name').val();
         last_name = $('#last_name').val();
         gender = $('#gender').val();
         email = $('#email').val();
         phone_number = $('#phone_number').val();
         address_1 = $('#address_1').val();
         address_2 = $('#address_2').val();
         city = $('#city').val();
         state = $('#state').val();
         postcode = $('#postcode').val();
         country = $('#country').val();
         comments = $('#comments').val();
         gstin = $('#gstin').val();
         account_number = $('#account_number').val();
         //alert('#account_number');
         
         $.ajax({
          url: "/customers",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            first_name:first_name,
            last_name:last_name,
            gender:gender,
            email:email,
            phone_number:phone_number,
            address_1:address_1,
            address_2:address_2,
            city:city,
            state:state,
            postcode:postcode,
            country:country,
            comments:comments,
            gstin:gstin,
            account_number:account_number,
          },
          success:function(response){

           if (response) {
             $("#addCustomer").modal("hide");
               $("#customer_form")[0].reset();
                 setTimeout(function(){
                  location.reload();
                 $(".message").html('Customer added successfully');
               }); 

             }else{
               $(".errorMessage").html('Customer not added successfully');
             }
           }
         });

            

      })

      $("#submitUpdate").click(function(){

         first_name = $('#first_name').val();
         last_name = $('#last_name').val();
         gender = $('#gender').val();
         email = $('#email').val();
         phone_number = $('#phone_number').val();
         address_1 = $('#address_1').val();
         address_2 = $('#address_2').val();
         city = $('#city').val();
         state = $('#state').val();
         postcode = $('#postcode').val();
         country = $('#country').val();
         comments = $('#comments').val();
         gstin = $('#gstin').val();
         account_number = $('#account_number').val();
         //alert('#account_number');
         
         $.ajax({
          url: "/customers/update",
          type:"post",
          data:{
            "_token": "{{ csrf_token() }}",
            first_name:first_name,
            last_name:last_name,
            gender:gender,
            email:email,
            phone_number:phone_number,
            address_1:address_1,
            address_2:address_2,
            city:city,
            state:state,
            postcode:postcode,
            country:country,
            comments:comments,
            gstin:gstin,
            account_number:account_number,
          },
          success:function(response){

           if (response) {
             $("#addCustomer").modal("hide");
               $("#customer_form")[0].reset();
                 setTimeout(function(){
                  location.reload();
                 $(".message").html('Customer added successfully');
               }); 

             }else{
               $(".errorMessage").html('Customer not added successfully');
             }
           }
         });

            

      })
   })
  
</script>