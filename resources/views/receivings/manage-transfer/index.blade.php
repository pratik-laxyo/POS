@extends('layouts.dbf')

@section('content')
<div class="container">
<div class="row">
<div class="row">
<div class="col-md-12">
    <div class="col-md-12">
        <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="active" role="presentation">
                <a data-toggle="tab" href="java_script:void(0)" onclick="pendingTransfer()" title="Pending Transfers" aria-expanded="true">Pending Transfers</a>
            </li>
            <li role="presentation" class="">
                <a data-toggle="tab" href="java_script:void(0)" onclick="transferLog()" title="Challan List" aria-expanded="false">Transfer Log</a>
            </li>
          </ul>
    </div>
    <hr>
    <div class="clearfix"> </div>
    <div class="content" style="margin-top:30px;"><div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2553">
          LaxyoHouse          &gt;&gt;
          Indraprastha          <span>(2020-06-05 20:36:28)</span>
        </a>
        <p class="pull-right">Items Left: 1</p>
      </h4>
    </div>
    <div id="collapse2553" class="panel-collapse collapse">
      <ul class="list-group">
                  <li class="list-group-item">
            20530274048484            <span class="pull-right">1</span>
          </li>
          
      </ul>
      <div class="panel-footer">Total Quantity: 1</div>
    </div>
  </div>
</div>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2549">
          LaxyoHouse &gt;&gt;Shop114         
           <span>(2020-06-02 23:50:52)</span>
        </a>
        <p class="pull-right">Items Left: 6</p>
      </h4>
    </div>
    <div id="collapse2549" class="panel-collapse collapse">
      <ul class="list-group">
                  <li class="list-group-item">
            134212021033296 <span class="pull-right">10</span>
          </li>
                  <li class="list-group-item">
            134212021033306 <span class="pull-right">40</span>
          </li>
                  <li class="list-group-item">
            134212021033292 <span class="pull-right">20</span>
          </li>
                  <li class="list-group-item">
            134212019033299 <span class="pull-right">5</span>
          </li>
                  <li class="list-group-item">
            134212020033291  <span class="pull-right">20</span>
          </li>
                  <li class="list-group-item">
            134212021033294 <span class="pull-right">10</span>
          </li>
          
      </ul>
      <div class="panel-footer">Total Quantity: 105</div>
    </div>
  </div>
</div>

</div>
</div>
</div>
<script>
$(document).ready( function () {
    dialog_support.init("button.modal-dlg-wide, a.modal-dlg-wide");
    $('.content').html('<img src="http://newpos.dbfindia.com/images/loadercyan.gif" alt="loading" />');
    $.post('http://newpos.dbfindia.com/receivings/get_transfer_status',{},function(data){
        $('.content').html(data);
    });
})
function stockIn(){
    $('.content').html('<img src="http://newpos.dbfindia.com/images/loadercyan.gif" alt="loading" />');
    $.post('http://newpos.dbfindia.com/receivings/stock_in',{},function(data){
        $('.content').html(data);
    });
}
function pendingTransfer(){
    $('.content').html('<img src="http://newpos.dbfindia.com/images/loadercyan.gif" alt="loading" />');
    $.post('http://newpos.dbfindia.com/receivings/get_transfer_status',{},function(data){
        $('.content').html(data);
    });
}
function transferLog(){
    $('.content').html('<img src="http://newpos.dbfindia.com/images/loadercyan.gif" alt="loading" />');
    var _token = $('input[name="_token"]').val();
    /*$.post('',{},function(data){
        $('.content').html(data);
    });*/
    var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"{{ route('all-chalances') }}",
          method:"POST",
          data:{_token:_token},
          success:function(data){
          $('.content').html(data);
          }
        });
}
</script>
@endsection
