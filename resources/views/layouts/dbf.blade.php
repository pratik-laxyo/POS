<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DBF | POS') }}</title>

    <!-- CSS Library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="asset('dbf-style/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dbf-style/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dbf-style/dist/opensourcepos.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>



<!-- JS Library -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>



<style type="text/css">
  p.help-inline{
    color: #d20000;
    font-weight: bold;
  }
</style>

</head>
<body>
    <div id="app">
        @guest  

        @else
        <div class="wrapper">
           <div class="topbar">
              <div class="container">
                 <div class="navbar-left">
                    <div id="liveclock">
                      <?php
                        date_default_timezone_set('Asia/Kolkata');
                        echo date('d/m/Y h:i:s A');
                      ?>
                    </div>
                 </div>
                 <div class="navbar-right" style="margin:0">
                    DBF Main Panel                    |   
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                 </div>
                 <div class="navbar-center" style="text-align:center">
                    <strong>DBF</strong>
                 </div>
              </div>
           </div>
           <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm" role="navigation" style="border-color: #e7e7e7;">
              <div class="container">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-sm" href="{{ route('home') }}">
                        <img height="45" width="75" src="{{ asset('dbf-style/images/dbflogo.png') }}">
                    </a>
                 </div>

                 <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <li class="active">
                          <a href="{{ route('home') }}" title="Home" class="menu-icon">
                          <img id="menuicon_home" src="{{ asset('dbf-style/images/menubar/home.png') }}" border="0" alt="Module Icon"><br>
                          Home</a>
                       </li>
                       <li class="">
                          <a href="{{ route('customers.index') }}" title="Customers" class="menu-icon">
                          <img id="menuicon_customers" src="{{ asset('dbf-style/images/menubar/customers.png') }}" border="0" alt="Module Icon"><br>
                          Customers</a>
                       </li>
                       <li class="">
                          <a href="{{ route('items.index') }}" title="Items" class="menu-icon">
                          <img id="menuicon_items" src="{{ asset('dbf-style/images/menubar/items.png') }}" border="0" alt="Module Icon"><br>
                          Items</a>
                       </li>
                       <li class="">
                          <a href="{{ route('manager.index') }}" title="Manager" class="menu-icon">
                          <img id="menuicon_manager" src="{{ asset('dbf-style/images/menubar/manager.png') }}" border="0" alt="Module Icon"><br>
                          Manager</a>
                       </li>
                       <li class="">
                          <a href="{{ route('item-kits.index') }}" title="Item Kits" class="menu-icon">
                          <img id="menuicon_item_kits" src="{{ asset('dbf-style/images/menubar/item_kits.png') }}" border="0" alt="Module Icon"><br>
                          Item Kits</a>
                       </li>
                       <li class="">
                          <a href="{{ route('reports.index') }}" title="Reports" class="menu-icon">
                          <img id="menuicon_reports" src="{{ asset('dbf-style/images/menubar/reports.png') }}" border="0" alt="Module Icon"><br>
                          Reports</a>
                       </li>
                       <li class="">
                          <a href="{{ route('receivings.index') }}" title="Receivings" class="menu-icon">
                          <img id="menuicon_receivings" src="{{ asset('dbf-style/images/menubar/receivings.png') }}" border="0" alt="Module Icon"><br>
                          Receivings</a>
                       </li>
                       <li class="">
                          <a href="{{ route('sales.index') }}" title="Sales" class="menu-icon">
                          <img id="menuicon_sales" src="{{ asset('dbf-style/images/menubar/sales.png') }}" border="0" alt="Module Icon"><br>
                          Sales</a>
                       </li>
                       <li class="">
                          <a href="{{ route('office.index') }}" title="Office" class="menu-icon">

                          <img id="menuicon_office" src="{{ asset('dbf-style/images/menubar/office.png') }}" border="0" alt="Module Icon"><br>
                          Office</a>
                       </li>
                    </ul>
                 </div>
              </div>
           </div>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>