@extends('layouts.dbf')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="container">
   <div class="row">
        <div class="col-md-12">
              <ul class="nav nav-tabs" data-tabs="tabs" id="shop_tab">
                 <li class="active" role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(4,7)" title="Laxyo Energy Ltd.">LaxyoHouse</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(6,4)" title="DBF Indraprastha">Indraprastha</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(8,10)" title="Annapurna Store">Annapurna</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(11,13)" title="DBF Mahalaxmi Nagar">Mahalaxmi</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(13,1439)" title="">Ratlam</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(16,1090)" title="">Bapat</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(20,7562)" title="DBF Shop 114">Shop114</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(22,10544)" title="DBF Airport Road">AirportRoad</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(27,12393)" title="">NewArrival</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(28,12393)" title="">Unchecked</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(29,12393)" title="">Damaged</a>
                 </li>
                 <li role="presentation">
                    <a data-toggle="tab" href="javascript:void(0)" onclick="count_data(30,12393)" title="">Scrap</a>
                 </li>
              </ul>
          <br>
        </div>

      <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="column">
                     <center>
                        <div class="card" style="background-color: #00cccc;">
                           <br>
                           <h3>Current Stock</h3>
                           <h1><span class="fa fa-tags" style="color: white;"></span></h1>
                           <h1 id="itemcount" class="loader_wait">102655</h1>
                           <br>
                        </div>
                     </center>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="column">
                     <center>
                        <div class="card" style="background-color: #ffcc66;">
                           <br>
                           <h3>Today's Sales</h3>
                           <h1><span class="fa fa-shopping-cart" style="color: white;"></span></h1>
                           <h1 id="dailySales" class="loader_wait">0</h1>
                           <br>
                        </div>
                     </center>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="column">
                     <center>
                        <div class="card" style="background-color: #ff704d;">
                           <br>
                           <h3>Today's Earning</h3>
                           <h1><span class="fa fa-inr" style="color: white;"></span></h1>
                           <h1 id="totalSales" class="loader_wait">0</h1>
                           <br>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
      </div>
      
      <div class="col-md-12">
         <div class="col-md-6">
            <h3>Points Table</h3>
            <table class="table table-hover table-bordered">
               <thead>
                  <tr>
                     <th>Shop Name</th>
                     <th>Total's Earning</th>
                     <th>Total Items</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>
         <div class="col-md-6 show_all_details " style="border: 1px solid #ddd; margin-top: 54px;">
            <h3 class=""><b>Login And Logout Details</b></h3>
            <div class="row">
               <div class="col-md-4">
                  <h5>Login Time:- <span id="logintime"></span></h5>
               </div>
               <div class="col-md-4">
                  <h5>Logout Time:- <span id="logouttime"></span></h5>
               </div>
               <div class="col-md-2 pull-right">                    
                  <a href="http://newpos.dbfindia.com/home/view_all/7" id="all_details" class="btn btn-success pull-right">View All</a>
               </div>
            </div>
            <div class="row">
               <br>
               <div class="col-md-12 show_all_details">
                  <table class="table table-hover table-bordered">
                     <thead>
                        <tr>
                           <th>Login Time</th>
                           <th>Logout Time</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr class="text-center">
                           <td colspan="3">No matching records found</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="login" value="10:00 ">
      <input type="hidden" id="logout" value="20:00 ">
      <input type="hidden" id="login_date" value=" ">
      <input type="hidden" id="current_date" value="2020-05-01 ">
      <input type="hidden" id="ip" value="157.34.121.12 ">
      <input type="hidden" id="login_type" value="superadmin">
      <input type="hidden" id="store_name" value="DBF Main Panel">
      <!-- Modal Popup -->
      <div id="MyPopup" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header ">
                  <h4 class="modal-title text-center">
                     <b>Welcome To </b><b id="shopName"></b>
                  </h4>
               </div>
               <div class="modal-body  text-center">
                  <h5><b>Click on this button</b></h5>
                  <br>
                  <button id="start_shop" type="button" class="btn btn-md btn-primary">Start Shop Now</button>
                  <br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
