<div class="content" style="margin-top:30px;">
   <div class="row">
      <div class="col-md-10">
      	<span class="successMsg" id="successMsg"></span>
      </div>
      <div class="col-md-2">
	    <button class="btn btn-info modal-dlg" style="float: right;" data-toggle="modal" data-target="#AddBundle" title="Add Bundle">Add Bundle</button>
      </div>  
   </div>
   <hr>
   <div id="cashier_table_area">
        <table id="cashier_list" class="table table-hover" style="width: 100%;" role="grid" aria-describedby="cashier_list_info">
          <thead>
             <tr role="row" style="height: 0px;">
                <th>Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Bundle</th>
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
          	@if(!empty($cashier))
          		@foreach($cashier as $cashiers)
		            <tr id="{{ $cashiers->id }}" role="row" class="odd">
		                <td class="sorting_1">{{ $cashiers->id }}</td>
		                <td>{{ $cashiers->name }}</td>
		                <td>{{ $cashiers->webkey }}</td>
		                <td>{{ $cashiers->contact_no }}</td>
		                <td>
		                   <a class="modal-dlg" id="updteModal" data-toggle="modal" data-id="{{ $cashiers->id }}" data-target="#UpdateCashier{{ $cashiers->id }}" style="font-size:20px"><i class="fa fa-pencil"></i></a> | 
		                   <input onchange="updateStatus('{{ $cashiers->id }}', '{{ $cashiers->status }}')" value="{{ $cashiers->status }}" class="toggle-one" name="status" @if($cashiers->status == '0') checked @endif type="checkbox" data-size="mini">
		                </td>
		            </tr>


		            <!-- Update Modal -->
					<div class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" id="UpdateCashier{{ $cashiers->id }}" role="dialog">
					    <div class="modal-dialog">
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">UPDATE Cashier</h4>
					        </div>
					        <div class="modal-body">
						        <form id="cashierUpdate{{ $cashiers->id }}">
						        	@csrf
								    <div class="form-group">
								        <label for="cashier_name">Cashier Name</label>
								        <input type="text" class="form-control" name="cashier_name" value="{{ $cashiers->name }}" placeholder="CASHIER NAME">
								    </div>

								    <div class="form-group">
								        <label for="cashier_webkey">Webkey</label>
								        <input type="text" class="form-control" name="cashier_webkey" value="{{ $cashiers->webkey }}" placeholder="WEBKEY">
								    </div>

								    <div class="form-group">
								        <label for="contact_no">Contact No.</label>
								        <input type="text" name="contact_no" class="form-control" value="{{ $cashiers->contact_no }}" placeholder="CONTACT NUMBER">
								    </div>

								    <button class="btn btn-primary" style="float: right">UPDATE</button>
								</form>
					        </div>
					      </div>   
					    </div>
					</div>
					<!-- Modal -->

		        @endforeach
		    @endif
          </tbody>
       </table>
   </div>

   	<!-- Add Modal -->
	<div class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" id="AddBundle" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">ADD Bundle</h4>
	        </div>
	        <div class="modal-body">
		        <form id="bundleAdd">
		        	@csrf
				    <div class="form-group">
				        <label for="title">Title</label>
				        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
				    </div>

				    <div class="form-group">
				        <label for="barcode">Barcode</label>
				        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Add Barcode">
				    </div>
				    
		    		<div class="form-group">
		    			<div class="row">
		    				<div class="col-md-6">
						        <label for="contact_no">Select Type</label>
						        <select class="form-control" name="type" id="type_id" onchange="selectType(this);">
						        	<option selected="" disabled="">Select</option>
						        	<option>Tag</option>
						        	<option>Category</option>
						        	<option>Subcategory</option>
						        	<option>Brand</option>
						        	<option>Barcode</option>
						        </select>
						    </div>

						    <div class="col-md-6" style="display: none;" id="hideDiv">
						    	<label for="contact_no">Select Category</label>
						        <select class="form-control" name="cat_id" id="cat_id" onchange="selectCat(this);">
						        	<option value="0" selected="" disabled="">Select Category</option>
						        	@if(!empty($category))
						        		@foreach($category as $cat)
						        			<option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
						        		@endforeach
						        	@endif
						        </select>
						    </div>
						</div>
				    </div>

				    <div class="form-group">
				        <label for="select">Select</label>
				        <input type="text" name="select" class="form-control" id="select">
				    </div>

				    <button type="submit" name="submit" class="btn btn-primary" style="float: right">ADD</button>
				</form>
	        </div>
	      </div>   
	    </div>
	</div>
	<!-- Modal -->


   	<script type="text/javascript">
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
		
		$("#bundleAdd").validate({
		  	errorElement: 'p',
        	errorClass: 'help-inline',
			
    		rules: {
		      title:{
		      	required:true,
		      	name_regex:true
		      },
		      type:{
		      	required:true
		      },
		      select:{
		      	required:true
		      },
		    },
		    
		    messages: {
		    },
      		submitHandler: function(form) {
      			alert($("#bundleAdd").serialize());
    			$.ajax({
	      			type: "post",
	      			url: "add_bundle",
	      			data: $("#bundleAdd").serialize(),
	      			success: function(data){
	      				alert(data);
	      				/*$('#bundleAdd').trigger("reset");
	      				$('#AddBundle').modal("hide");
	      				$("#successMsg").html(data.successMsg).delay(2000).fadeOut();
	      				setTimeout(function() {
						    location.reload();
						}, 2000);*/
	      			}
	      		});
    		}
 		});

		function updateStatus(id, status){
			var _token = $('input[name="_token"]').val();
			$.ajax({
      			type: "post",
      			url: "update_status",
      			data: { id:id, status:status, _token:_token },
      			success: function(data){
      				console.log(data);
      			}
      		});
		}


	  	$(document).ready(function() {
	      	$('#cashier_list').DataTable();
	    });

	    function selectType(){
	    	var type_id = document.getElementById("type_id").value;
			if(type_id == 'Subcategory'){
				$("#hideDiv").css("display", "block");
			} else {
				$("#hideDiv").css("display", "none");
			}
			selectCat(type_id);
		}

		function selectCat(id){
			var cat_id = document.getElementById("cat_id").value;
			console.log(cat_id);
			var _token = $('input[name="_token"]').val();
			$.ajax({
				type: "post",
				url: "get_list",
				data: { type: id, cat_id: cat_id, _token:_token },
				success: function(data) {
					alert(data);
				}
			});
		}
	</script>
</div>