@extends('layouts.dbf')

@section('content')
<div class="container">
   <div class="row">
      <div class="row">
         <h3 class="text-center">Create Limit</h3>
         <div class="col-md-12">
            <form id="addLimits">
               @csrf
               <div class="form-inline">
                  <div class="form-group">
                     <select id="plimit_category" name="plimit_category" class="form-control">
                        <option value="">Select Category</option>
                        @if(!empty($category))
                           @foreach($category as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                           @endforeach
                        @endif
                     </select>
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control" id="plimit_count" name="plimit_count">
                  </div>
                  <button id="create_plimit" type="submit" class="btn btn-sm btn-success">Submit</button>
               </div>
            </form>
         </div>
      </div>
      <hr>
      <div id="active_plimit_window">
         <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title">Active Limit</h3>
               </div>

               @if(!empty($limits))
                  @foreach($limits as $limit)
                     <div class="panel-body">
                        <a href="#" title="Edit" class="modal-dlg">{{ $limit['limits_category']->category_name }} | {{ $limit->limit_count }}</a>
                        <span class="pull-right" id="1">
                           <style>
                              .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
                              .toggle.ios .toggle-handle { border-radius: 20px; }
                           </style>
                           <div class="toggle btn btn-success btn-xs ios" data-toggle="toggle" style="width: 34px; height: 22px;">
                              <input type="checkbox" class="plimit_toggle" checked="" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-size="mini">
                              <div class="toggle-group">
                                 <label class="btn btn-success btn-xs toggle-on">On</label>
                                 <label class="btn btn-danger btn-xs active toggle-off">Off</label>
                                 <span class="toggle-handle btn btn-default btn-xs"></span>
                              </div>
                           </div>
                        </span>
                     </div>
                  @endforeach
               @endif
            </div>
         </div>
      </div>
      <script>
         $(document).ready( function () {
            $("#addLimits").on("submit", function(e){
               e.preventDefault();
               $.ajax({
                  type: "post",
                  url: "add_limits",
                  data: $("#addLimits").serialize(),
                  success: function(data){
                     // alert(data);
                     location.reload();
                  }
               });
            });
         });
      </script>
   </div>
</div>

@endsection