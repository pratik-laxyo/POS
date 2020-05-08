@extends('layouts.dbf')

@section('content')

<div class="container">
<div class="row">

<div class="row">
	<div class="col-xs-3 mb-2" align="center">
	    <p>
	      @if($message = Session::get('success'))
	        <div class="alert alert-success">
	          <p>{{ $message }}</p>
	        </div>
	      @endif
	    </p>
   </div>
	<div class="bg-info" style="color:#fff;padding:10px;margin-bottom:20px;">
      <a style="color:#fff" href="http://newpos.dbfindia.com/manager"><h4 style="display:inline">Manager</h4>  </a>&gt;&gt; MCI 
  </div>
	{{-- <span class="col-md-2 pull-right">
		<select id="select_mci" class="form-control">
			<option value="">Select MCI</option>
			<option value="categories">Category</option>
			<option value="subcategories">Subcategory</option>
			<option value="brands">Brand</option>
			<option value="sizes">Size</option>
			<option value="colors">Color</option>
		</select>
	</span> --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  </script>
  
	<div class="container">
	  <h2>SELECTMCI</h2>
	  <ul class="nav nav-tabs" id="feedtab">
	    <li class="active"><a data-toggle="tab" href="#Category">Category</a></li>
	    <li><a data-toggle="tab" href="#Subcategory">Subcategory</a></li>
	    <li><a data-toggle="tab" href="#Brand">Brand</a></li>
	    <li><a data-toggle="tab" href="#Size">Size</a></li>
	    <li><a data-toggle="tab" href="#Color">Color</a></li>
	  </ul>
	<div class="tab-content">
	<div id="Category" class="tab-pane fade in active">
      <div class="container" style="margin-bottom: 20px;">
      	<h3>Category</h3>
        <form id="customer_form" class="form-horizontal" method="post" action="{{ route('mci-category.store') }}" >
           @csrf
	    	<span class="col-md-6">
				<input type="text" id="category_name" class="form-control input-sm" placeholder="Enter Category" name="category_name" value="{{ old('category_name')}}">
				<span id="category_name">
					@error('category_name')
		              <span class="text-danger" role="alert">
		              <strong>{{ $message }}</strong>
		              </span>
		            @enderror
				</span>
			</span>
			<span class="col-md-2">
				<button type="submit" id="save" class="btn btn-sm btn-success">Create</button>
			</span>
	    </form>
      </div>

<div class="container">
	<table id="example" class="display" style="width:100%">
        <thead>
	        <tr>
	          <th>ID</th>
	          <th>Name</th>
	          <th>Action</th>
	        </tr>
        </thead>
        <tbody>
		<?php foreach ($mciCategory as $value) { ?>
            <tr>
                <td>{{$value->id}}</td>
                <td align="center">{{$value->category_name}}</td>
                <td><form method="post" action="{{ route('mci-category.destroy',$value->id) }}">
                    @csrf
                    @method('DELETE')
                    {{-- Edit Button with model box call --}}
                    <button type="button" data-toggle="modal" data-target="#ediCategory{{ $value->id }}" class="fa fa-pencil-square-o btn btn-primary">
                    </button>
                   {{-- Delete button --}}
                    <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                  </button>
              	</form>
                </td>
            </tr>
  {{-- Edit Model Box start ,this model box popup on edit button click --}}
	<div class="container">
	    <div class="modal fade" id="ediCategory{{ $value->id }}" role="dialog">
	    <div class="modal-dialog">
	          <!-- Modal content-->
	       <div class="row">
	         <div style="width: 80%;" class="modal-content">
	           <div class="modal-header">
	            <h3 class="tile-title">Update Category</h3>
	               <button class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title"></h4>
	               </div>
	              <div class="modal-body">
	                <div class="clearix"></div>
	                <div class="col-md-8">
	                  <div class="tile">
	                    <div class="tile-body">
	                      <form class="row" action="{{route('mci-category.update',$value->id)}}" method="post">
	                      @csrf
	                      @method('PUT')
	                        <div class="form-group col-md-6">
	                          <label class="control-label">Category Name</label>
	                          <input value="{{ $value->category_name}}" name="category_name" class="form-control" type="text">
	                          <span id="category_name">
								@error('category_name')
					              <span class="text-danger" role="alert">
					              <strong>{{ $message }}</strong>
					              </span>
					            @enderror
								</span>
	                          </div><br>
	                          <div class="form-group col-md-4 align-self-end">
	                            <button type="submit" class="btn btn-primary">
	                              <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
	                            </button>
	                          </div>
	                        </form>
	                      {{-- END Update FORM --}}
	     
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="modal-footer">
	                  <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
	                </div>
	           </div>
	        </div>
	    </div>
	   </div>
	</div>
	{{-- Edit Model/Update Box End --}}
     <?php } ?>
    </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
	</div>
    </div>

    <div id="Subcategory" class="tab-pane fade" style="margin-bottom: 20px;">
      <h3>Sub-Category</h3>
      <div>
        <form id="customer_form" class="form-horizontal" method="post" action="{{ route('mci-subcategory.store') }}" >
           @csrf
	    	<span class="col-md-5">
			<input type="text" id="sub_categories_name" class="form-control input-sm" placeholder="Enter Sub-Category" name="sub_categories_name" value="{{ old('sub_categories_name')}}">
			<span id="sub_categories_name">
			@error('sub_categories_name')
              <span class="text-danger" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
			</span>
			</span>
			<span class="col-md-5">
			{{-- <select id="category_name"class="form-control input-sm" name="category_name">
			<option value=""><--SELECT CATEGORY--></option>
				
			</select> --}}
			<input list="brow" placeholder="SEARCH AND SELECT CATEGORY" class="form-control input-sm" name="category_name">
			<datalist id="brow">
			  <?php foreach ($mciCategory as $value)
			{ ?>
			<option value="{{$value->id}}">{{$value->category_name}}</option>
			<?php }?>
			</datalist>
			<span id="category_name">
			@error('category_name')
              <span class="text-danger" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
			</span>
			<div class="mt-2">
				<span class="col-md-2 mt-2">
				<button type="submit" id="save" class="btn btn-sm btn-success">Create</button>
			</span>
			</div>
	    </form>
      </div>
	    <div class="container ">
		<table id="example1" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
		<?php foreach ($mciSubCategory as $value) { ?>
            <tr>
                <td>{{$value->id}}</td>
                <td align="center">{{$value->sub_categories_name}}</td>
                <td >
                	<form method="post" action="{{ route('mci-subcategory.destroy',$value->id) }}">
                    @csrf
                    @method('DELETE')
                    {{-- Edit Button with model box call --}}
                    <button type="button" data-toggle="modal" data-target="#ediSubCategoryd{{ $value->id }}" class="fa fa-pencil-square-o btn btn-primary">
                    </button>
                   {{-- Delete button --}}
                    <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                     {{-- <i  aria-hidden="true"></i> --}}
                  </button>
              	</form>
              </td>
            </tr>
{{-- Edit Model Box start ,this model box popup on edit button click --}}
		<div class="container">
		  <div class="modal fade" id="ediSubCategoryd{{ $value->id }}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="row">
		        <div style="width: 80%;" class="modal-content">
		          <div class="modal-header">
		          	 <h3 class="tile-title">Update Sub-Category</h3>
		            <button class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title"></h4>
		           </div>
		          <div class="modal-body">
		            <div class="clearix"></div>
		            <div class="col-md-8">
		              <div class="tile">
		                <div class="tile-body">
		                  <form class="row" action="{{route('mci-subcategory.update',$value->id)}}" method="post">
		                  @csrf
		                  @method('PUT')
		                    <div class="form-group col-md-6">
		                      <label class="control-label">Sub-Category Name</label>
		                      <input value="{{ $value->sub_categories_name}}" name="sub_categories_name" class="form-control" type="text">
		                      <span id="sub_categories_name">
								@error('sub_categories_name')
					              <span class="text-danger" role="alert">
					              <strong>{{ $message }}</strong>
					              </span>
					            @enderror
								</span>
		                      </div>
		                      <div class="form-group col-md-6">
		                      <label class="control-label">Category Name</label><br><br>
		                     <input list="brow" placeholder="SEARCH AND SELECT CATEGORY" class="form-control input-sm" name="category_name">
							<datalist id="brow">
							  <?php foreach ($mciCategory as $value)
							{ ?>
							<option value="{{$value->id}}">{{$value->category_name}}</option>
							<?php }?>
							</datalist>
							<span id="category_name">
							@error('category_name')
				              <span class="text-danger" role="alert">
				              <strong>{{ $message }}</strong>
				              </span>
				            @enderror
		                      </div>
		                      <div class="form-group col-md-4 align-self-end">
		                        <button type="submit" class="btn btn-primary">
		                          <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
		                        </button>
		                      </div>
		                    </form>
		                  {{-- END Update FORM --}}
		 
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="modal-footer">
		              <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
{{-- Edit Model/Update Box End --}}
    <?php } ?>
 	</tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
    </table>
	</div>
    </div>
 <div id="Brand" class="tab-pane fade" >
  <h3>Brand</h3>
  <div class="container" style="margin-bottom: 20px;">
    <form id="customer_form" class="form-horizontal" method="post" action="{{ route('mci-brand.index') }}" >
     @csrf
    	<span class="col-md-6">
		<input type="text" id="brand_name" class="form-control input-sm" placeholder="Enter Brand" name="brand_name" value="{{ old('brand_name')}}">
		<span id="brand_name">
			@error('brand_name')
	          <span class="text-danger" role="alert">
	          <strong>{{ $message }}</strong>
	          </span>
	        @enderror
			</span>
		</span>
			<span class="col-md-2">
				<button type="submit" id="save" class="btn btn-sm btn-success">Create</button>
			</span>
	    </form>
      </div>
	    <div class="container ">
		<table id="example3" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach ($mciBrand as $value) { ?>
            <tr>
                <td>{{$value->id}}</td>
                <td align="center">{{$value->brand_name}}</td>
                <td >
                <form method="post" action="{{ route('mci-brand.destroy',$value->id) }}">
                    @csrf
                    @method('DELETE')
                    {{-- Edit Button with model box call --}}
                    <button type="button" data-toggle="modal" data-target="#ediBrand{{ $value->id }}" class="fa fa-pencil-square-o btn btn-primary">
                    </button>
                   {{-- Delete button --}}
                    <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                     {{-- <i  aria-hidden="true"></i> --}}
                  </button>
              </form>
              </td>
            </tr>
{{-- Edit Model Box start ,this model box popup on edit button click --}}
			<div class="container">
			  <div class="modal fade" id="ediBrand{{ $value->id }}" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			      <div class="row">
			        <div style="width: 80%;" class="modal-content">
			          <div class="modal-header">
			          	 <h3 class="tile-title">Update Brand</h3>
			            <button class="close" data-dismiss="modal">&times;</button>
			            <h4 class="modal-title"></h4>
			           </div>
			          <div class="modal-body">
			            <div class="clearix"></div>
			            <div class="col-md-8">
			              <div class="tile">
			                <div class="tile-body">
			                  <form class="row" action="{{route('mci-brand.update',$value->id)}}" method="post">
			                  @csrf
			                  @method('PUT')
			                    <div class="form-group col-md-6">
			                      <label class="control-label">Brand Name</label>
			                      <input value="{{ $value->brand_name}}" name="brand_name" class="form-control" type="text">
			                      <span id="brand_name">
									@error('brand_name')
						              <span class="text-danger" role="alert">
						              <strong>{{ $message }}</strong>
						              </span>
						            @enderror
									</span>
			                      </div><br>
			                      <div class="form-group col-md-4 align-self-end">
			                        <button type="submit" class="btn btn-primary">
			                          <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
			                        </button>
			                      </div>
			                    </form>
			                  {{-- END Update FORM --}}
			 
			                  </div>
			                </div>
			              </div>
			            </div>
			            <div class="modal-footer">
			              <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
			            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
  {{-- Edit Model/Update Box End --}}
    <?php } ?>
	</tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
    </table>
	</div>
    </div>
    <div id="Size" class="tab-pane fade" >
      <div class="container" style="margin-bottom: 20px;">
      <h3>Size</h3>
        <form id="customer_form" class="form-horizontal" method="post" action="{{ route('mci-size.store') }}" >
           @csrf
	    	<span class="col-md-6">
			<input type="text" id="sizes_name" class="form-control input-sm" placeholder="Enter size" name="sizes_name" value="{{ old('sizes_name')}}">
				<span id="sizes_name">
					@error('sizes_name')
		              <span class="text-danger" role="alert">
		              <strong>{{ $message }}</strong>
		              </span>
		            @enderror
				</span>
			</span>
			<span class="col-md-2">
				<button type="submit" id="save" class="btn btn-sm btn-success">Create</button>
			</span>
	    </form>
      </div>
	    <div class="container ">
		<table id="example4" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
		<?php foreach ($mciSize as $value) { ?>
            <tr>
                <td>{{$value->id}}</td>
                <td align="center">{{$value->sizes_name}}</td>
                <td >
                	<form method="post" action="{{ route('mci-size.destroy',$value->id) }}">
                    @csrf
                    @method('DELETE')
                    {{-- Edit Button with model box call --}}
                    <button type="button" data-toggle="modal" data-target="#ediSize{{ $value->id }}" class="fa fa-pencil-square-o btn btn-primary">
                    </button>
                   {{-- Delete button --}}
                    <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                     {{-- <i  aria-hidden="true"></i> --}}
                  </button>
              	</form>
                </td>
            </tr>
 {{-- Edit Model Box start ,this model box popup on edit button click --}}
		<div class="container">
		  <div class="modal fade" id="ediSize{{ $value->id }}" role="dialog">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="row">
		        <div style="width: 80%;" class="modal-content">
		          <div class="modal-header">
		          	 <h3 class="tile-title">Update Size</h3>
		            <button class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title"></h4>
		           </div>
		          <div class="modal-body">
		            <div class="clearix"></div>
		            <div class="col-md-8">
		              <div class="tile">
		                <div class="tile-body">
		                  <form class="row" action="{{route('mci-size.update',$value->id)}}" method="post">
		                  @csrf
		                  @method('PUT')
		                    <div class="form-group col-md-6">
		                      <label class="control-label">Size Name</label>
		                      <input value="{{ $value->sizes_name}}" name="sizes_name" class="form-control" type="text">
		                      <span id="sizes_name">
								@error('sizes_name')
					              <span class="text-danger" role="alert">
					              <strong>{{ $message }}</strong>
					              </span>
					            @enderror
								</span>
		                      </div><br>
		                      <div class="form-group col-md-4 align-self-end">
		                        <button type="submit" class="btn btn-primary">
		                          <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
		                        </button>
		                      </div>
		                    </form>
		                  {{-- END Update FORM --}}
		 
		                  </div>
		                </div>
		              </div>
		            </div>
		            <div class="modal-footer">
		              <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		{{-- Edit Model/Update Box End --}}
    <?php } ?>
		 </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
    </table>
	</div>
    </div>
    <div id="Color" class="tab-pane fade" >
      <div class="container" style="margin-bottom: 20px;">
      <h3>Colors</h3>
        <form id="customer_form" class="form-horizontal" method="post" action="{{ route('mci-color.store') }}" >
         @csrf
	    	<span class="col-md-6">
			<input type="text" id="color_name" class="form-control input-sm" placeholder="Enter color" name="color_name" value="{{ old('color_name')}}">
				<span id="color_name">
					@error('color_name')
		              <span class="text-danger" role="alert">
		              <strong>{{ $message }}</strong>
		              </span>
		            @enderror
				</span>
			</span>
			<span class="col-md-2">
				<button type="submit" id="save" class="btn btn-sm btn-success">Create</button>
			</span>
	    </form>
      </div>
	    <div class="container ">
		<table id="example5" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach ($mciColor as $value) { ?>
            <tr>
                <td>{{$value->id}}</td>
                <td align="center">{{$value->color_name}}</td>
                <td >
                	<form method="post" action="{{ route('mci-color.destroy',$value->id) }}">
                    @csrf
                    @method('DELETE')
                    {{-- Edit Button with model box call --}}
                    <button type="button" data-toggle="modal" data-target="#ediColor{{ $value->id }}" class="fa fa-pencil-square-o btn btn-primary">
                    </button>
                   {{-- Delete button --}}
                    <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                     {{-- <i  aria-hidden="true"></i> --}}
                  </button>
              	</form>
              </td>
            </tr>
		{{-- Edit Model Box start ,this model box popup on edit button click --}}
		<div class="container">
		<div class="modal fade" id="ediColor{{ $value->id }}" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="row">
		    <div style="width: 80%;" class="modal-content">
		      <div class="modal-header">
		      	 <h3 class="tile-title">Update Color</h3>
		        <button class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"></h4>
		       </div>
		      <div class="modal-body">
		        <div class="clearix"></div>
		        <div class="col-md-8">
		          <div class="tile">
		            <div class="tile-body">
		              <form class="row" action="{{route('mci-color.update',$value->id)}}" method="post">
		              @csrf
		              @method('PUT')
		                <div class="form-group col-md-6">
		                  <label class="control-label">Color Name</label>
		                  <input value="{{ $value->color_name}}" name="color_name" class="form-control" type="text">
		                  <span id="color_name">
							@error('color_name')
				              <span class="text-danger" role="alert">
				              <strong>{{ $message }}</strong>
				              </span>
				            @enderror
							</span>
		                  </div><br>
		                  <div class="form-group col-md-4 align-self-end">
		                    <button type="submit" class="btn btn-primary">
		                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
		                    </button>
		                  </div>
		                </form>
		              {{-- END Update FORM --}}

		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
	{{-- Edit Model/Update Box End --}}
    <?php } ?>
	</tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
    </table>
	</div>
    </div>
  </div>
</div>
	
</div>
<hr>
<div class="row">
	<div id="suggestion" class="text-center"></div>
	<div class="col-md-6 col-md-offset-3" id="mci_sublist">
		
	</div>
	<div class="col-md-3">
		<select id="cSwitch" class="form-control" style="display:none">
				<option value="26">ACCESSORIES</option>
				
		</select>
	</div>
</div>

<style type="text/css">
	.myImp{
		width: 100% !important;
    border: none !important;
    background: none !important;
  }
</style>

</div>
</div>


{{-- Datatable for export files.............. --}}
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
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } ); 
    $('#example3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } ); 
    $('#example4').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    $('#example5').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );

    
} );
</script>


@endsection
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>

 $(document).ready(function(){
    $(".reason-approve").click(function(){
    	
	    var id = this.id;
	    var text = $(this).data("value");
	    var name = $('.category_name1').val();
	    // var category_name = $(category_names1).val('.category_name');
	  	alert(name);
        //var reason;
  		var text = prompt("Please enter the value","");
	    if (!text){
	        return false;
	    }else {
			reason =  text;
			$('input[name="category_name"]').val(name);
		}
		
	});
	$("#approved").click(function(){
	    if (!confirm("Do you want to approve")){
	      return false;
	    }
	  });
});
</script>
