@extends('layouts.dbf')

@section('content')
<body data-gr-c-s-loaded="true">
	<div class="wrapper">
		<div class="topbar">
			<div class="container">
				<div class="navbar-left">
					<div id="liveclock">08/05/2020 12:24:27 PM</div>
				</div>

				<div class="navbar-right" style="margin:0">
					DBF Main Panel					  |   
					<a href="http://newpos.dbfindia.com/home/logout">Logout</a>					
				</div>

				<div class="navbar-center" style="text-align:center">
					<strong>DBF</strong>
				</div>
			</div>
		</div>

		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			
					<a class="navbar-brand hidden-sm" href="http://newpos.dbfindia.com/">
						<img src="http://newpos.dbfindia.com//images/dbflogo.png" width="75" height="45">
					</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<a href="http://newpos.dbfindia.com/employees" title="Employees" class="menu-icon">
						<img id="menuicon_employees" src="http://newpos.dbfindia.com/images/menubar/employees.png" alt="Module Icon" border="0"><br>
						Employees</a>
							</li>
						<li class=""><a href="http://newpos.dbfindia.com/messages" title="Messages" class="menu-icon">
						<img id="menuicon_messages" src="http://newpos.dbfindia.com/images/menubar/messages.png" alt="Module Icon" border="0"><br>
						Messages								</a>
						</li>
						<li class=""><a href="http://newpos.dbfindia.com/config" title="Configuration" class="menu-icon">
						<img id="menuicon_config" src="http://newpos.dbfindia.com/images/menubar/config.png" alt="Module Icon" border="0"><br>Configuration	</a>
						</li>
						<li class=""><a href="http://newpos.dbfindia.com/offers" title="Offers" class="menu-icon">
						<img id="menuicon_offers" src="http://newpos.dbfindia.com/images/menubar/offers.png" alt="Module Icon" border="0"><br>Offers</a>
						</li>
						<li class=""><a href="http://newpos.dbfindia.com/office" title="Office" class="menu-icon">
						<img id="menuicon_office" src="http://newpos.dbfindia.com/images/menubar/office.png" alt="Module Icon" border="0"><br>Office</a>
						</li>
						</ul>
				</div>
			</div>
		</div>
		 
<div class="container">
	<div class="row">

<div id="title_bar" class="btn-toolbar">
	<button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/employees/view" title="New Employee"  data-toggle="modal" data-target="#addCustomer">
		<span class="glyphicon glyphicon-user">&nbsp;</span>New Employee	
	</button>

	<a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/employees/get_datatable">Data Table</a>
	<a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/manager/fetch_valid_customers_contact_no">Contact Numbers</a>
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div id="table_holder">
	<div class="bootstrap-table">
		<div class="fixed-table-toolbar">
			<div class="bs-bars pull-left">
				<div id="toolbar">
				<div class="pull-left btn-toolbar">
					<button id="delete" class="btn btn-default btn-sm" disabled="disabled">
						<span class="glyphicon glyphicon-trash">&nbsp;</span>Delete			
					</button>
						
					<button id="email" class="btn btn-default btn-sm" disabled="">
						<span class="glyphicon glyphicon-envelope">&nbsp;</span>Email		
					</button>
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
				<button class="btn btn-default btn-sm" type="button" name="refresh" aria-label="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i>
				</button>

				<div class="export btn-group">
					<button class="btn btn-default btn-sm dropdown-toggle" aria-label="export type" title="Export data" data-toggle="dropdown" type="button"><i class="glyphicon glyphicon-export icon-share"></i> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu"><li role="menuitem" data-type="json"><a href="javascript:void(0)">JSON</a></li><li role="menuitem" data-type="xml"><a href="javascript:void(0)">XML</a></li><li role="menuitem" data-type="csv"><a href="javascript:void(0)">CSV</a></li><li role="menuitem" data-type="txt"><a href="javascript:void(0)">TXT</a></li><li role="menuitem" data-type="sql"><a href="javascript:void(0)">SQL</a></li><li role="menuitem" data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li><li role="menuitem" data-type="pdf"><a href="javascript:void(0)">PDF</a></li></ul>
				</div>
			</div>
			<div class="pull-right search"><input class="form-control input-sm" type="text" placeholder="Search">
			</div>
		</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="table-sticky-header_sticky_anchor_end"></div></div>
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
               <div class="col-xs-3 mb-2" align="center">
                    
                  <div class="errorMessage"> </div>
               </div>
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

					<form action="{{route('employees.store')}}" id="employee_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
                @csrf          
						<ul class="nav nav-tabs nav-justified" data-tabs="tabs">
							<li class="active" role="presentation">
								<a data-toggle="tab" href="#employee_basic_info">Information</a>
							</li>
							<li role="presentation">
								<a data-toggle="tab" href="#employee_login_info">Login</a>
							</li>
							<li role="presentation">
								<a data-toggle="tab" href="#employee_permission_info">Permissions</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane fade in active" id="employee_basic_info">
								<fieldset>
									<div class="form-group form-group-sm">	
						<label for="first_name" class="required control-label col-xs-3" aria-required="true">First Name</label>	<div class="col-xs-8">
							<input type="text" name="first_name" value="" id="first_name" class="form-control input-sm">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="last_name" class="required control-label col-xs-3" aria-required="true">Last Name</label>	<div class="col-xs-8">
							<input type="text" name="last_name" value="" id="last_name" class="form-control input-sm">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="gender" class="control-label col-xs-3">Gender</label>	<div class="col-xs-4">
							<label class="radio-inline">
								<input type="radio" name="gender" value="1" id="gender">
					 M		</label>
							<label class="radio-inline">
								<input type="radio" name="gender" value="0" id="gender">
					 F		</label>

						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="email" class="control-label col-xs-3">Email</label>	<div class="col-xs-8">
							<div class="input-group">
								<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="text" name="email" value="" id="email" class="form-control input-sm">
							</div>
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="phone_number" class="required control-label col-xs-3" aria-required="true">Phone Number</label>	<div class="col-xs-8">
							<div class="input-group">
								<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
								<input type="text" name="phone_number" value="" id="phone_number" class="form-control input-sm">
							</div>
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="address_1" class="control-label col-xs-3">Address 1</label>	<div class="col-xs-8">
							<input type="text" name="address_1" value="" id="address_1" class="form-control input-sm">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="address_2" class="control-label col-xs-3">Address 2</label>	<div class="col-xs-8">
							<input type="text" name="address_2" value="" id="address_2" class="form-control input-sm">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="city" class="control-label col-xs-3">City</label>	<div class="col-xs-8">
							<input type="text" name="city" value="" id="city" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="state" class="control-label col-xs-3">State</label>	<div class="col-xs-8">
							<input type="text" name="state" value="" id="state" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="zip" class="control-label col-xs-3">Postal Code</label>	<div class="col-xs-8">
							<input type="text" name="zip" value="" id="postcode" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="country" class="control-label col-xs-3">Country</label>	<div class="col-xs-8">
							<input type="text" name="country" value="" id="country" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
						</div>
					</div>

					<div class="form-group form-group-sm">	
						<label for="comments" class="control-label col-xs-3">Comments</label>	<div class="col-xs-8">
							<textarea name="comments" cols="40" rows="10" id="comments" class="form-control input-sm"></textarea>
						</div>
					</div>
			</fieldset>
			{{-- <div class="modal-footer" style="display: block;">
				<div class="bootstrap-dialog-footer">
					<div class="bootstrap-dialog-footer-buttons">
						<button class="btn btn-primary" id="submit" type="submit">Submit</button>
					</div>
				</div>
			</div>
		</form> --}}
</div>
{{-- End add Employees code ............... --}}


{{-- start Login Employees code ............... --}}

<div class="tab-pane" id="employee_login_info">
	<fieldset>
		{{-- <form action="{{route('employees.store')}}" id="employee_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate"> --}}
        @csrf  
		<div class="form-group form-group-sm">	
			<label for="username" class="required control-label col-xs-3" aria-required="true">Username</label>					
			<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm">
						<span class="glyphicon glyphicon-user"></span></span>
					<input type="text" name="username" value="" id="username" class="form-control input-sm">
				</div>
			</div>
		</div>
		<div class="form-group form-group-sm">	
			<label for="password" class="control-label col-xs-3">Password</label>					<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" value="" id="password" class="form-control input-sm">
				</div>
			</div>
		</div>

		<div class="form-group form-group-sm">	
			<label for="repeat_password" class="control-label col-xs-3">Password Again</label>	
			<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="repeat_password" value="" id="repeat_password" class="form-control input-sm">
				</div>
			</div>
		</div>

		<div class="form-group form-group-sm">
			<label for="language" class="control-label col-xs-3">Language</label>					
			<div class="col-xs-8">
				<div class="input-group">
					<select name="language" class="form-control input-sm">
						<option value="ar-EG:arabic">Arabic (Egypt)</option>
						<option value="az-AZ:azerbaijani">Azerbaijani (Azerbaijan)</option>
						<option value="bg:bulgarian">Bulgarian</option>
						<option value="de:german">German (Germany)</option>
						<option value="de-CH:german">German (Swiss)</option>
						<option value="en-GB:english">English (Great Britain)</option>
						<option value="en-US:english">English (United States)</option>
						<option value="es:spanish">Spanish</option>
						<option value="fr:french">French</option>
						<option value="hr-HR:croatian">Croatian (Croatia)</option>
						<option value="hu-HU:hungarian">Hungarian (Hungary)</option>
						<option value="id:indonesian">Indonesian</option>
						<option value="it:italian">Italian</option>
						<option value="km:khmer">Central Khmer (Cambodia)</option>
						<option value="lo:lao">Lao (Laos)</option>
						<option value="nl-BE:dutch">Dutch (Belgium)</option>
						<option value="pt-BR:portuguese-brazilian">Portuguese (Brazil)</option>
						<option value="ru:russian">Russian</option>
						<option value="sv:swedish">Swedish</option>
						<option value="th:thai">Thai</option>
						<option value="tr:turkish">Turkish</option>
						<option value="vi:vietnamese">Vietnamese</option>
						<option value="zh:simplified-chinese">Chinese</option>
						<option value=":" selected="selected">System Language</option>
					</select>
				</div>
			</div>
		</div>
	</fieldset>
	
</div>
{{-- end Login Employees code ............... --}}

{{-- start permission for Employees code......... --}}

	<div class="tab-pane" id="employee_permission_info">
		<fieldset>
			<p>Check the boxes below to grant access to modules.</p>

				<ul id="permission_list">
					<li>	
						<input type="checkbox" name="grant_home" value="home" class="module">
						<select name="menu_group_home" class="module" disabled="">
							<option value="home" selected="selected">Home</option>
							<option value="office">Office</option>
							<option value="both">Both</option>
						</select>
						<span class="medium">Home:</span>
						<span class="small">List home menu modules.</span>
					</li>
					<li>	
						<input type="checkbox" name="grant_customers" value="customers" class="module">
						<select name="menu_group_customers" class="module" disabled="">
							<option value="home" selected="selected">Home</option>
							<option value="office">Office</option>
							<option value="both">Both</option>
						</select>
						<span class="medium">Customers:</span>
						<span class="small">Add, Update, Delete, and Search Customers.</span>
					</li>
					<li>	
						<input type="checkbox" name="grant_items" value="items" class="module">
						<select name="menu_group_items" class="module" disabled="">
							<option value="home" selected="selected">Home</option>
							<option value="office">Office</option>
							<option value="both">Both</option>
							</select>
						<span class="medium">Items:</span>
						<span class="small">Add, Update, Delete, and Search Items.</span>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_AirportRoad" value="items_AirportRoad" disabled="">
						<input type="hidden" name="menu_group_items_AirportRoad" value="--" disabled="">
						<span class="medium">AirportRoad</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Annapurna" value="items_Annapurna" disabled="">
					
						<input type="hidden" name="menu_group_items_Annapurna" value="--" disabled="">
						<span class="medium">Annapurna</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Apnagps" value="items_Apnagps" disabled="">
					
						<input type="hidden" name="menu_group_items_Apnagps" value="--" disabled="">
						<span class="medium">Apnagps</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Bapat" value="items_Bapat" disabled="">
					
						<input type="hidden" name="menu_group_items_Bapat" value="--" disabled="">
						<span class="medium">Bapat</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Damaged" value="items_Damaged" disabled="">
					
						<input type="hidden" name="menu_group_items_Damaged" value="--" disabled="">
						<span class="medium">Damaged</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Indraprastha" value="items_Indraprastha" disabled="">
						
						<input type="hidden" name="menu_group_items_Indraprastha" value="--" disabled="">
						<span class="medium">Indraprastha</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_KhandwaRoad" value="items_KhandwaRoad" disabled="">
						
						<input type="hidden" name="menu_group_items_KhandwaRoad" value="--" disabled="">
						<span class="medium">KhandwaRoad</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_LaxyoHouse" value="items_LaxyoHouse" disabled="">
						
						<input type="hidden" name="menu_group_items_LaxyoHouse" value="--" disabled="">
						<span class="medium">LaxyoHouse</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Mahalaxmi" value="items_Mahalaxmi" disabled="">
						
						<input type="hidden" name="menu_group_items_Mahalaxmi" value="--" disabled="">
						<span class="medium">Mahalaxmi</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_NewArrival" value="items_NewArrival" disabled="">
					
						<input type="hidden" name="menu_group_items_NewArrival" value="--" disabled="">
						<span class="medium">NewArrival</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Ratlam" value="items_Ratlam" disabled="">
						
						<input type="hidden" name="menu_group_items_Ratlam" value="--" disabled="">
						<span class="medium">Ratlam</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Scrap" value="items_Scrap" disabled="">
					
						<input type="hidden" name="menu_group_items_Scrap" value="--" disabled="">
						<span class="medium">Scrap</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Shop114" value="items_Shop114" disabled="">
					
						<input type="hidden" name="menu_group_items_Shop114" value="--" disabled="">
						<span class="medium">Shop114</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_items_Unchecked" value="items_Unchecked" disabled="">
					
						<input type="hidden" name="menu_group_items_Unchecked" value="--" disabled="">
						<span class="medium">Unchecked</span>
					</li>
				</ul>
					</li>
					<li>	
						<input type="checkbox" name="grant_manager" value="manager" class="module">
						<select name="menu_group_manager" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
						</select>
						<span class="medium">Manager:</span>
						<span class="small">Implement Manager</span>
											</li>
									<li>	
						<input type="checkbox" name="grant_item_kits" value="item_kits" class="module">
						<select name="menu_group_item_kits" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
						</select>
						<span class="medium">Item Kits:</span>
						<span class="small">Add, Update, Delete and Search Item Kits.</span>
					</li>
					<li>	
						<input type="checkbox" name="grant_suppliers" value="suppliers" class="module">
						<select name="menu_group_suppliers" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
						</select>
						<span class="medium">Suppliers:</span>
						<span class="small">Add, Update, Delete, and Search Suppliers.</span>
					</li>
					<li>	
						<input type="checkbox" name="grant_reports" value="reports" class="module">
						<select name="menu_group_reports" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
						</select>
						<span class="medium">Reports:</span>
						<span class="small">View and generate Reports.</span>
				<ul>
					<li>
						<input type="checkbox" name="grant_reports_categories" value="reports_categories" disabled="">
					
						<input type="hidden" name="menu_group_reports_categories" value="--" disabled="">
						<span class="medium">Categories</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_reports_customers" value="reports_customers" disabled="">
					
						<input type="hidden" name="menu_group_reports_customers" value="--" disabled="">
						<span class="medium">Customers</span>
					</li>
				</ul>
				<ul>
					<li>
						<input type="checkbox" name="grant_reports_discounts" value="reports_discounts" disabled="">
					
						<input type="hidden" name="menu_group_reports_discounts" value="--" disabled="">
					<span class="medium">Discounts</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_employees" value="reports_employees" disabled="">
					
					<input type="hidden" name="menu_group_reports_employees" value="--" disabled="">
					<span class="medium">Employees</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_expenses_categories" value="reports_expenses_categories" disabled="">
					
					<input type="hidden" name="menu_group_reports_expenses_categories" value="--" disabled="">
					<span class="medium">Expenses</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_inventory" value="reports_inventory" disabled="">
					
					<input type="hidden" name="menu_group_reports_inventory" value="--" disabled="">
					<span class="medium">Inventory</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_items" value="reports_items" disabled="">
					
					<input type="hidden" name="menu_group_reports_items" value="--" disabled="">
					<span class="medium">Items</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_payments" value="reports_payments" disabled="">
					
					<input type="hidden" name="menu_group_reports_payments" value="--" disabled="">
					<span class="medium">Payments</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_receivings" value="reports_receivings" disabled="">
					
					<input type="hidden" name="menu_group_reports_receivings" value="--" disabled="">
					<span class="medium">Receivings</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_sales" value="reports_sales" disabled="">
					
					<input type="hidden" name="menu_group_reports_sales" value="--" disabled="">
					<span class="medium">Transactions</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_suppliers" value="reports_suppliers" disabled="">
					
					<input type="hidden" name="menu_group_reports_suppliers" value="--" disabled="">
					<span class="medium">Suppliers</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_reports_taxes" value="reports_taxes" disabled="">
					
					<input type="hidden" name="menu_group_reports_taxes" value="--" disabled="">
					<span class="medium">Taxes</span>
				</li>
			</ul>
					</li>
			<li>	
					<input type="checkbox" name="grant_receivings" value="receivings" class="module">
					<select name="menu_group_receivings" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
					</select>
					<span class="medium">Receivings:</span>
					<span class="small">Process Purchase Orders.</span>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_AirportRoad" value="receivings_AirportRoad" disabled="">
					
					<input type="hidden" name="menu_group_receivings_AirportRoad" value="--" disabled="">
					<span class="medium">AirportRoad</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Annapurna" value="receivings_Annapurna" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Annapurna" value="--" disabled="">
					<span class="medium">Annapurna</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Apnagps" value="receivings_Apnagps" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Apnagps" value="--" disabled="">
					<span class="medium">Apnagps</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Bapat" value="receivings_Bapat" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Bapat" value="--" disabled="">
					<span class="medium">Bapat</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Damaged" value="receivings_Damaged" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Damaged" value="--" disabled="">
					<span class="medium">Damaged</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Indraprastha" value="receivings_Indraprastha" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Indraprastha" value="--" disabled="">
					<span class="medium">Indraprastha</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_KhandwaRoad" value="receivings_KhandwaRoad" disabled="">
					
					<input type="hidden" name="menu_group_receivings_KhandwaRoad" value="--" disabled="">
					<span class="medium">KhandwaRoad</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_LaxyoHouse" value="receivings_LaxyoHouse" disabled="">
					
					<input type="hidden" name="menu_group_receivings_LaxyoHouse" value="--" disabled="">
					<span class="medium">LaxyoHouse</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Mahalaxmi" value="receivings_Mahalaxmi" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Mahalaxmi" value="--" disabled="">
					<span class="medium">Mahalaxmi</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_NewArrival" value="receivings_NewArrival" disabled="">
					
					<input type="hidden" name="menu_group_receivings_NewArrival" value="--" disabled="">
					<span class="medium">NewArrival</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Ratlam" value="receivings_Ratlam" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Ratlam" value="--" disabled="">
					<span class="medium">Ratlam</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Scrap" value="receivings_Scrap" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Scrap" value="--" disabled="">
					<span class="medium">Scrap</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Shop114" value="receivings_Shop114" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Shop114" value="--" disabled="">
					<span class="medium">Shop114</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_receivings_Unchecked" value="receivings_Unchecked" disabled="">
					
					<input type="hidden" name="menu_group_receivings_Unchecked" value="--" disabled="">
					<span class="medium">Unchecked</span>
				</li>
			</ul>
					</li>
			<li>	
					<input type="checkbox" name="grant_warehouse" value="warehouse" class="module">
					<select name="menu_group_warehouse" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
					</select>
					<span class="medium">Warehouse:</span>
					<span class="small">Implement Warehouse</span>
										</li>
								<li>	
					<input type="checkbox" name="grant_sales" value="sales" class="module">
					<select name="menu_group_sales" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
					</select>
					<span class="medium">Sales:</span>
					<span class="small">Process Sales and Returns.</span>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_AirportRoad" value="sales_AirportRoad" disabled="">
					
					<input type="hidden" name="menu_group_sales_AirportRoad" value="--" disabled="">
					<span class="medium">AirportRoad</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Annapurna" value="sales_Annapurna" disabled="">
					
					<input type="hidden" name="menu_group_sales_Annapurna" value="--" disabled="">
					<span class="medium">Annapurna</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Apnagps" value="sales_Apnagps" disabled="">
					
					<input type="hidden" name="menu_group_sales_Apnagps" value="--" disabled="">
					<span class="medium">Apnagps</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Bapat" value="sales_Bapat" disabled="">
					
					<input type="hidden" name="menu_group_sales_Bapat" value="--" disabled="">
					<span class="medium">Bapat</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Damaged" value="sales_Damaged" disabled="">
					
					<input type="hidden" name="menu_group_sales_Damaged" value="--" disabled="">
					<span class="medium">Damaged</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_delete" value="sales_delete" disabled="">
					
					<input type="hidden" name="menu_group_sales_delete" value="--" disabled="">
					<span class="medium">Allow Delete</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Indraprastha" value="sales_Indraprastha" disabled="">
					
					<input type="hidden" name="menu_group_sales_Indraprastha" value="--" disabled="">
					<span class="medium">Indraprastha</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_KhandwaRoad" value="sales_KhandwaRoad" disabled="">
					
				<input type="hidden" name="menu_group_sales_KhandwaRoad" value="--" disabled="">
					<span class="medium">KhandwaRoad</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_LaxyoHouse" value="sales_LaxyoHouse" disabled="">
					
					<input type="hidden" name="menu_group_sales_LaxyoHouse" value="--" disabled="">
					<span class="medium">LaxyoHouse</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Mahalaxmi" value="sales_Mahalaxmi" disabled="">
					
					<input type="hidden" name="menu_group_sales_Mahalaxmi" value="--" disabled="">
					<span class="medium">Mahalaxmi</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_NewArrival" value="sales_NewArrival" disabled="">
					
					<input type="hidden" name="menu_group_sales_NewArrival" value="--" disabled="">
					<span class="medium">NewArrival</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Ratlam" value="sales_Ratlam" disabled="">
					
					<input type="hidden" name="menu_group_sales_Ratlam" value="--" disabled="">
					<span class="medium">Ratlam</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Scrap" value="sales_Scrap" disabled="">
					
					<input type="hidden" name="menu_group_sales_Scrap" value="--" disabled="">
					<span class="medium">Scrap</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Shop114" value="sales_Shop114" disabled="">
					
					<input type="hidden" name="menu_group_sales_Shop114" value="--" disabled="">
					<span class="medium">Shop114</span>
				</li>
			</ul>
										<ul>
				<li>
					<input type="checkbox" name="grant_sales_Unchecked" value="sales_Unchecked" disabled="">
					
					<input type="hidden" name="menu_group_sales_Unchecked" value="--" disabled="">
					<span class="medium">Unchecked</span>
				</li>
			</ul>
					</li>
			<li>	
					<input type="checkbox" name="grant_employees" value="employees" class="module">
					<select name="menu_group_employees" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
						<option value="both">Both</option>
					</select>
					<span class="medium">Employees:</span>
					<span class="small">Add, Update, Delete, and Search Employees.</span>
					</li>
			<li>	
					<input type="checkbox" name="grant_giftcards" value="giftcards" class="module">
					<select name="menu_group_giftcards" class="module" disabled="">
						<option value="home" selected="selected">Home</option>
						<option value="office">Office</option>
					<option value="both">Both</option>
					</select>
					<span class="medium">Gift Cards:</span>
					<span class="small">Add, Update, Delete and Search Gift Cards.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_messages" value="messages" class="module">
				<select name="menu_group_messages" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Messages:</span>
				<span class="small">Send Messages to Customers, Suppliers and Employees.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_taxes" value="taxes" class="module">
				<select name="menu_group_taxes" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Taxes:</span>
				<span class="small">Configure Sales Taxes.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_expenses" value="expenses" class="module">
				<select name="menu_group_expenses" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Expenses:</span>
				<span class="small">Add, Update, Delete, and Search Expenses.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_expenses_categories" value="expenses_categories" class="module">
				<select name="menu_group_expenses_categories" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Expenses Categories:</span>
				<span class="small">Add, Update, and Delete Expenses Categories.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_config" value="config" class="module">
				<select name="menu_group_config" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Configuration:</span>
				<span class="small">Change OSPOS's Configuration.</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_offers" value="offers" class="module">
				<select name="menu_group_offers" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Offers:</span>
				<span class="small">Implement Offers</span>
					</li>
			<li>	
				<input type="checkbox" name="grant_office" value="office" class="module">
				<select name="menu_group_office" class="module" disabled="">
					<option value="home" selected="selected">Home</option>
					<option value="office">Office</option>
					<option value="both">Both</option>
				</select>
				<span class="medium">Office:</span>
				<span class="small">List office menu modules.</span>
			</li>
		</ul>
		</fieldset>

		</div>
		<div class="modal-footer" >
		<div class="bootstrap-dialog-footer">
			<div class="bootstrap-dialog-footer-buttons">
				<button class="btn btn-primary" id="submit" type="submit">Submit</button>
			</div>
		</div>
	</div>
</form>
	</div>
{{-- end permission for Employees code......... --}}
	

			</div>
		</div>
	</div>
</div>


	</div>
</div>

</div>

</div>
</div>
{{-- Show all Employees.......................... --}}
<div class="container">
	<div class="fixed-table-body">
		<div class="fixed-table-loading" style="top: 44px; display: none;">Loading, please wait...</div
			>
			<div id="table-sticky-header-sticky-header-container" class="hidden">
				
			</div>
			<div id="table-sticky-header_sticky_anchor_begin">
				
			</div>
			<table id="Emptable" class="table table-hover table-striped">
				<thead id="table-sticky-header">
					<tr>
						<th class="bs-checkbox print_hide" style="width: 36px; " data-field="checkbox">
							<div class="th-inner "><input name="btSelectAll" type="checkbox">
							</div>
							<div class="fht-cell">
								
							</div>
						</th>
						<th class="" style="" data-field="people.person_id">
							<div class="th-inner sortable both desc">Id</div>
							<div class="fht-cell"></div>
						</th>
						<th class="" style="" data-field="first_name">
							<div class="th-inner sortable both">First Name</div>
							<div class="fht-cell"></div>
						</th>
						<th class="" style="" data-field="last_name">
							<div class="th-inner sortable both">Last Name</div><div class="fht-cell"></div>
						</th>
						<th class="" style="" data-field="email">
							<div class="th-inner sortable both">Email</div>
							<div class="fht-cell"></div>
						</th>
						<th class="" style="" data-field="phone_number">
							<div class="th-inner sortable both">Phone Number</div>
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
			<tbody>
				<?php foreach ($employees as $value) { ?>
				<tr data-index="0" data-uniqueid="12393"> 
					<td class="bs-checkbox print_hide">
						<input data-index="0" name="btSelectItem" type="checkbox">
					</td> 
					<td class="" style="">{{$value->id}}</td>
					<td class="" style="">{{$value->first_name}}</td> 
					<td class="" style="">{{$value->last_name}}</td> <td class="" style="">{{$value->email}}</td>
					<td class="" style="">{{$value->phone_number}}</td> 
					<td class="print_hide" style="">
						<a class="modal-dlg" data-btn-submit="Submit" title="Send SMS" data-toggle="modal" data-target="#sendSms{{ $value->id }}"><span class="glyphicon glyphicon-phone"></span></a>
					</td> 
					<td class="print_hide" style="">
						<a class="modal-dlg" data-btn-submit="Submit" title="Update Employee" data-toggle="modal" data-target="#editEmployee{{ $value->id }}"><span class="glyphicon glyphicon-edit">
					</span>
				</a>
			</td> 
		</tr>

<<<<<<< HEAD
{{-- Edit Customers code model....................... --}}
=======
{{-- Edit Employees code model....................... --}}
>>>>>>> laratrast
   <div class="modal fade" id="editEmployee{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
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

               <form action="{{route('employees.update',$value->id)}}" id="customer_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
                @csrf
                @method('PUT') 

               <ul class="nav nav-tabs nav-justified" data-tabs="tabs">
                  <li class="active" role="presentation">
                     <a data-toggle="tab" href="#customer_basic_info">Information</a>
                  </li>
                  <li role="presentation" class="">
<<<<<<< HEAD
					<a data-toggle="tab" href="#editemployee_login_info" aria-expanded="false">Login</a>
=======
					<a data-toggle="tab" href="#editemployee_login_info{{ $value->id }}" aria-expanded="false">Login</a>
>>>>>>> laratrast
					</li>
					<li role="presentation" class="">
						<a data-toggle="tab" href="#employee_permission_info" aria-expanded="false">Permissions</a>
					</li>
               </ul>

               <div class="tab-content">
                  <div class="tab-pane fade in active" id="customer_basic_info">
                     <fieldset>
                     <div class="form-group form-group-sm"> 
               			<label for="first_name" class="required control-label col-sm-3" aria-required="true">First Name</label>  
		                <div class="col-xs-8">
		                  <input type="text" name="first_name" value="{{ $value->first_name}}" id="first_name" class="form-control input-sm">
		                </div>
            		</div><br><br>
	            <div class="form-group form-group-sm"> 
	               <label for="last_name" class="required control-label col-xs-3" aria-required="true">Last Name</label> <div class="col-xs-8">
	                  <input type="text" name="last_name" value="{{ $value->last_name}}" id="last_name" class="form-control input-sm">
	               </div>
	            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="gender" class="control-label col-xs-3" >Gender</label> <div class="col-xs-8">
                  <div class="col-xs-4">
                     <label class="radio-inline">Male</label>
                     <input type ="radio" name="gender" value="male" id="gender" class="form-control input-sm" <?php if ($value->gender == "male") echo "checked"; ?>>
                  </div>
                  <div class="col-xs-4">
                     <label class="radio-inline">Female</label>
                     <input type ="radio" name="gender" value="female" id="gender" class="form-control input-sm" <?php if ($value->gender == "female") echo "checked"; ?>>
                  </div>
               </div>
            </div><br><br>
            <div class="form-group form-group-sm"> 
               <label for="email" class="control-label col-xs-3">Email</label>   <div class="col-xs-8">
                  <div class="input-group">
                     <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-envelope"></span></span>
                     <input type="text" name="email" value="{{ $value->email}}" id="email" class="form-control input-sm">
                  </div>
               </div>
            </div><br><br>
            <div class="form-group form-group-sm"> 
               <label for="phone_number" class="required control-label col-xs-3" aria-required="true">Phone Number</label> <div class="col-xs-8">
                  <div class="input-group">
                     <span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
                     <input type="text" name="phone_number" value="{{ $value->phone_number}}" id="phone_number" class="form-control input-sm">
                  </div>
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="address_1" class="control-label col-xs-3">Address 1</label> 
               <div class="col-xs-8">
                  <input type="text" name="address_1" value="{{ $value->address_1}}" id="address_1" class="form-control input-sm">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="address_2" class="control-label col-xs-3">Address 2</label> 
               <div class="col-xs-8">
                  <input type="text" name="address_2" value="{{ $value->address_2}}" id="address_2" class="form-control input-sm">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="city" class="control-label col-xs-3">City</label>  
               <div class="col-xs-8">
                  <input type="text" name="city" value="{{ $value->city}}" id="city" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="state" class="control-label col-xs-3">State</label>   
               <div class="col-xs-8">
                  <input type="text" name="state" value="{{ $value->state}}" id="state" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="zip" class="control-label col-xs-3">Postal Code</label>  
               <div class="col-xs-8">
                  <input type="text" name="zip" value="{{ $value->postcode}}" id="postcode" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="country" class="control-label col-xs-3">Country</label>  
               <div class="col-xs-8">
                  <input type="text" name="country" value="{{ $value->country}}" id="country" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
               </div>
            </div><br><br>

            <div class="form-group form-group-sm"> 
               <label for="comments" class="control-label col-xs-3">Comments</label>   
               <div class="col-xs-8">
                  <textarea name="comments" cols="40" rows="10" id="comments" class="form-control input-sm" value="{{ $value->comments}}" >{{ $value->comments}}</textarea>
               </div>
            </div>
                        
               </fieldset>
                </div>
<<<<<<< HEAD
     	{{-- start Login Employees code ............... --}}

<div class="tab-pane" id="editemployee_login_info">
	<fieldset><br><br>
		{{-- <form action="{{route('employees.store')}}" id="employee_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate"> --}}
        @csrf  
        
		<div class="form-group form-group-sm">	
			<label for="username" class="required control-label col-xs-3" aria-required="true">Username</label>	<br><br>				
=======
{{-- start Login Employees code ............... --}}

		<?php dd( $value ); ?>
<div class="tab-pane" id="editemployee_login_info{{ $value->id }}">
	<fieldset>
		{{-- <form action="{{route('employees.store')}}" id="employee_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate"> --}}
        @csrf  
		<div class="form-group form-group-sm">	
			<label for="username" class="required control-label col-xs-3" aria-required="true">Username</label>					
>>>>>>> laratrast
			<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm">
						<span class="glyphicon glyphicon-user"></span></span>
<<<<<<< HEAD
					<input type="text" name="username" value="{{$value->usersInfo}}" id="username" class="form-control input-sm">
				</div>
			</div>
		</div><br><br>
		<div class="form-group form-group-sm">	
			<label for="password" class="control-label col-xs-3">Password</label><br><br>
=======
					<input type="text" name="username" value="{{ $value->id }}" id="username" class="form-control input-sm">
				</div>
			</div>
		</div>
		<div class="form-group form-group-sm">	
			<label for="password" class="control-label col-xs-3">Password</label>					
>>>>>>> laratrast
			<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" value="" id="password" class="form-control input-sm">
				</div>
			</div>
<<<<<<< HEAD
		</div><br><br>

		<div class="form-group form-group-sm">	
			<label for="repeat_password" class="control-label col-xs-3">Password Again</label><br><br>	
=======
		</div>

		<div class="form-group form-group-sm">	
			<label for="repeat_password" class="control-label col-xs-3">Password Again</label>	
>>>>>>> laratrast
			<div class="col-xs-8">
				<div class="input-group">
					<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="repeat_password" value="" id="repeat_password" class="form-control input-sm">
				</div>
			</div>
<<<<<<< HEAD
		</div><br><br>

		<div class="form-group form-group-sm">
			<label for="language" class="control-label col-xs-3">Language</label><br><br>					
=======
		</div>

		<div class="form-group form-group-sm">
			<label for="language" class="control-label col-xs-3">Language</label>					
>>>>>>> laratrast
			<div class="col-xs-8">
				<div class="input-group">
					<select name="language" class="form-control input-sm">
						<option value="ar-EG:arabic">Arabic (Egypt)</option>
						<option value="az-AZ:azerbaijani">Azerbaijani (Azerbaijan)</option>
						<option value="bg:bulgarian">Bulgarian</option>
						<option value="de:german">German (Germany)</option>
						<option value="de-CH:german">German (Swiss)</option>
						<option value="en-GB:english">English (Great Britain)</option>
						<option value="en-US:english">English (United States)</option>
						<option value="es:spanish">Spanish</option>
						<option value="fr:french">French</option>
						<option value="hr-HR:croatian">Croatian (Croatia)</option>
						<option value="hu-HU:hungarian">Hungarian (Hungary)</option>
						<option value="id:indonesian">Indonesian</option>
						<option value="it:italian">Italian</option>
						<option value="km:khmer">Central Khmer (Cambodia)</option>
						<option value="lo:lao">Lao (Laos)</option>
						<option value="nl-BE:dutch">Dutch (Belgium)</option>
						<option value="pt-BR:portuguese-brazilian">Portuguese (Brazil)</option>
						<option value="ru:russian">Russian</option>
						<option value="sv:swedish">Swedish</option>
						<option value="th:thai">Thai</option>
						<option value="tr:turkish">Turkish</option>
						<option value="vi:vietnamese">Vietnamese</option>
						<option value="zh:simplified-chinese">Chinese</option>
						<option value=":" selected="selected">System Language</option>
					</select>
				</div>
			</div>
		</div>
	</fieldset>
	
</div>
{{-- end Login Employees code ............... --}}
<<<<<<< HEAD

               </div>
             </div>
=======
</div>
 </div>
>>>>>>> laratrast
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitUpdate">Submit </button>
                  </div>

               </form>
                </div>
              </div>
            </div>
            </div>
		               
		   </div>
		</div>
      </div>
   </div>
</div>
{{-- End edit customer............................ --}}

{{-- send sms for employee......................... --}}
<div class="modal fade" id="sendSms{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send SMS</h5>
           <div class="col-xs-3 mb-2" align="center">
                
              <div class="errorMessage"> </div>
           </div>
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
					
				<form action="{{route('send-message')}}" id="send_sms_form" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
				@csrf                         
					<fieldset>
						<div class="form-group form-group-sm">
							<label for="first_name_label" class="control-label col-xs-2">First name</label>			
							<div class="col-xs-10">
								<input type="text" name="first_name" value="{{ $value->first_name }}" class="form-control input-sm" readonly="true">
							</div>
						</div><br><br>
						<div class="form-group form-group-sm">
							<label for="last_name_label" class="control-label col-xs-2">Last name</label>	
							<div class="col-xs-10">
								<input type="text" name="last_name" value="{{ $value->last_name }}" class="form-control input-sm" readonly="true">
							</div>
						</div> <br><br>
						<div class="form-group form-group-sm">
							<label for="phone_label" class="control-label col-xs-2 required" aria-required="true">Phone number</label>			
							<div class="col-xs-10">
								<div class="input-group">
									<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
									<input type="text" name="phone_number" value="{{ $value->phone_number }}" class="form-control input-sm required" aria-required="true">
								</div>
							</div>
						</div><br><br>
						<div class="form-group form-group-sm">
							<label for="message_label" class="control-label col-xs-2 required" aria-required="true">Message</label>			
							<div class="col-xs-10">
								<textarea name="message" cols="40" rows="10" class="form-control input-sm required" id="message" aria-required="true"></textarea>
							</div>
						</div>
					</fieldset>
				{{-- <script type="text/javascript">
				$(document).ready(function()
				{
					$('#send_sms_form').validate($.extend({
						submitHandler:function(form) 
						{
							$(form).ajaxSubmit({
								success:function(response)
								{
									dialog_support.hide();
									table_support.handle_submit('http://newpos.dbfindia.com/messages', response);
								},
								dataType:'json'
							});
						},
						rules:
						{
							phone:
							{
								required:true,
								number:true
							},
							message:
							{
								required:true,
								number:false
							}
				   		},
						messages:
						{
							phone:
							{
								required:"Phone number required",
								number:"Phone number"
							},
							message:
							{
								required:"Message required"
							}
						}
					}, form_support.error));
				});
			</script> --}}
		</div>
	</div>
</div>
</div>
<div class="modal-footer" style="display: block;">
<div class="bootstrap-dialog-footer">
	<div class="bootstrap-dialog-footer-buttons">
		<button class="btn btn-primary" id="submit" type="submit">Submit
		</button>
	</div>
</div>
</div>
</form>

</div>
</div>
</div>
{{-- end send sms for employee....................... --}}
	<?php  } ?>
	</tbody>
</table>
</div>
{{-- end view all employee....................... --}}

<div id="footer">
<!-- <div class="jumbotron push-spaces"> -->
	<!-- <strong>  			 - </strong>.
				<a href="https://github.com/jekkos/opensourcepos" target="_blank"></a>
	 -->
<!-- </div> -->
			
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<script type="text/javascript">
//validation and submit handling

	   $.validator.addMethod("mobile_regex", function(value, element) {
		return this.optional(element) || /^\d{10}$/i.test(value);
		}, "Please Enter No Only.");
		
		$.validator.addMethod("password_regex", function(value, element) {
		return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
		}, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");
		
		$.validator.addMethod("email_regex", function(value, element) {
		return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
		}, "The Email Address Is Not Valid Or In The Wrong Format");
		
		$.validator.addMethod("name_regex", function(value, element) {
		return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
		}, "Please choose a name with only a-z 0-9.");
		
		$("#employee_form").validate({
		  errorElement: 'p',
        errorClass: 'help-inline',
			
    	rules: {

	      // email:{
	      	//   required: true,
	      	//   email_regex: true
	      // },
	      	first_name:{
		      	required:true,
		      	name_regex:true
	      	},
		    last_name:{
		      	required:true,
		      	name_regex:true
	      	},
	      	phone_number:{
		      	required:true,
		      	mobile_regex:true
	      	},
	      	type:{
		        required: true
		    },
	      	
	      	username:
			{
				required:true,
				minlength: 5
			},
			
			password:
			{
				required:true,
				minlength: 8
			},	
			repeat_password:
			{
				equalTo: "#password"
			},
		},
		messages: 
		{
			first_name: "First Name is a required field.",
			last_name: "Last Name is a required field.",
			username:
			{
				required: "Username is a required field.",
				minlength: "Username must be at least 5 characters in length."
			},

			password:
			{
				required:"Password is required.",
				minlength: "Password must be at least 8 characters in length."
			},
			repeat_password:
			{
				equalTo: "Passwords do not match."
			},
			email: "The email address is not in the correct format."
		},
    
	    
      submitHandler: function(form) {
    	form.submit();
    	}
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
    $('#Emptable').DataTable( {
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
{{-- <script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
	$.validator.setDefaults({ ignore: [] });

	$.validator.addMethod("module", function (value, element) {
		var result = $("#permission_list input").is(":checked");
		$(".module").each(function(index, element)
		{
			var parent = $(element).parent();
			var checked =  $(element).is(":checked");
			if ($("ul", parent).length > 0 && result)
			{
				result &= !checked || (checked && $("ul > li > input:checked", parent).length > 0);
			}
		});
		return result;
	}, 'Add at least one grant for each module.');

	$("ul#permission_list > li > input.module").each(function()
	{
		var $this = $(this);
		$("ul > li > input,select", $this.parent()).each(function()
		{
			var $that = $(this);
			var updateInputs = function (checked)
			{
				$that.prop("disabled", !checked);
				!checked && $that.prop("checked", false);
			}
			$this.change(function() {
				updateInputs($this.is(":checked"));
			});
			updateInputs($this.is(":checked"));
		});
	});
	
	$('#employee_form').validate($.extend({
		submitHandler:function(form) 
		{
			$(form).ajaxSubmit({
				success:function(response)
				{
					dialog_support.hide();
					table_support.handle_submit('http://newpos.dbfindia.com/employees', response);
				},
				dataType:'json'
			});
		},
		rules:
		{
			first_name: "required",
			last_name: "required",
			username:
			{
				required:true,
				minlength: 5
			},
			
			password:
			{
								required:true,
								minlength: 8
			},	
			repeat_password:
			{
				equalTo: "#password"
			},
			email: "email"
		},
		messages: 
		{
			first_name: "First Name is a required field.",
			last_name: "Last Name is a required field.",
			username:
			{
				required: "Username is a required field.",
				minlength: "Username must be at least 5 characters in length."
			},

			password:
			{
								required:"Password is required.",
								minlength: "Password must be at least 8 characters in length."
			},
			repeat_password:
			{
				equalTo: "Passwords do not match."
			},
			email: "The email address is not in the correct format."
		}
	}, form_support.error));
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
</script>	 --}}