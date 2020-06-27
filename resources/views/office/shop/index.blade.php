@extends('layouts.dbf')

@section('content')

<div class="container" id="container">
   <div class="row">
      <div id="title_bar" class="btn-toolbar">
      	<div class="col-md-10">
      		<div class="text-center successMsg" id="successMsg"></div>
      	</div>
      	<div class="col-md-2">
        	<button class="btn btn-info btn-sm pull-right modal-dlg" data-toggle="modal" data-target="#AddShop" title="New Shop"><span class="glyphicon glyphicon-user">&nbsp;</span>New Shop</button>
        </div>
      </div>

      <div id="tbldata">
      	@include("office.shop.test")
      </div>

    <!-- Add Modal -->
	<div class="modal fade" id="AddShop" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">ADD SHOP</h4>
	        </div>
	        <div class="modal-body">
		        <form id="CreateShop">
		        	@csrf
				    <div class="form-group">
				        <label for="shop_name">Shop Name</label>
				        <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="SHOP NAME">
				    </div>

				    <div class="form-group">
				        <label for="shop_owner_name">Shop Owner Name</label>
				        <input type="text" class="form-control" name="shop_owner_name" id="shop_owner_name" placeholder="OWNER NAME">
				    </div>

				    <div class="row">
				    	<div class="col-md-6">
				    		<div class="form-group">
						        <label for="contact_no">Contact No.</label>
						        <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="CONTACT NUMBER">
						        <div id="contactErr" class="registeredMsg"></div>
						    </div>
						</div>
						<div class="col-md-6">
						    <div class="form-group">
						        <label for="email">Email Address</label>
						        <input type="text" name="email" class="form-control" id="email" placeholder="EMAIL ADDRESS">
						        <div id="emailErr" class="registeredMsg"></div>
						    </div>
				    	</div>
				    </div>

				    <div class="form-group">
				        <label for="shop_address">Shop Address</label>
				        <textarea name="shop_address" id="shop_address" class="form-control" placeholder="SHOP ADDRESS"></textarea>
				    </div>

				    <div class="row">
				    	<div class="col-md-6">
				    		<div class="form-group">
						        <label for="role_id">Role</label>
						        <select class="form-control" name="role_id" id="role_id">
						        	<option disabled="" selected="">Select Roles</option>
						        	@if(!empty($role))
						        		@foreach($role as $roles)
						        			<option value="{{ $roles->id }}">{{ $roles->display_name }}</option>
						        		@endforeach
						        	@endif
						        </select>
						    </div>
						</div>
						<div class="col-md-6">
						    <div class="form-group">
						        <label for="password">Password</label>
				        		<input type="text" class="form-control" name="password" id="password" placeholder="Password">
						    </div>
				    	</div>
				    </div>

				    <button type="submit" name="submit" class="btn btn-primary" style="float: right">ADD</button>
				</form>
	        </div>
	      </div>   
	    </div>
	</div>
	<!-- Modal -->
   </div>
</div>

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
	
	$("#CreateShop").validate({
	  	errorElement: 'p',
    	errorClass: 'help-inline',
		
		rules: {
	      shop_name:{
	      	required:true,
	      	name_regex:true
	      },
	      shop_owner_name:{
	      	required:true,
	      	name_regex:true
	      },
	      contact_no:{
	      	required:true,
	      	mobile_regex:true
	      },
	      email:{
	      	required:true,
	      	email_regex:true
	      },
	      shop_address:{
	      	required:true,
	      },
	      password:{
	      	required:true,
	      },
	    },
	    
	    messages: {
	    },
  		submitHandler: function(form) {
  			$("#contactErr").html("");
		    $("#emailErr").html("");
	 		$.ajax({
		        type: 'post',
		        url: '{{ route("shop.store") }}',
		        data: $('#CreateShop').serialize(),
		        success: function(data) {
		            $("#contactErr").html(data.contactErr);
		            $("#emailErr").html(data.emailErr);
		            if(data.successMsg){
			            $("#CreateShop").trigger("reset");
			            $("#AddShop").modal("hide");
			            $("#tbldata").load("{{ 'test' }}");
				        $("#successMsg").html(data.successMsg).delay(2000).fadeOut();
			            setTimeout(function() {
						    location.reload();
						}, 2000);
					}
		        },
		    });
  		}
  	});


  	$(document).ready(function() {
      	/*$("#CreateShop").on('submit', function(e) {
	   		e.preventDefault();
	   		$("#contactErr").html("");
		    $("#emailErr").html("");
	 		$.ajax({
		        type: 'post',
		        url: '{{ route("shop.store") }}',
		        data: $('#CreateShop').serialize(),
		        success: function(data) {
		            $("#contactErr").html(data.contactErr);
		            $("#emailErr").html(data.emailErr);
		            if(data.successMsg){
			            $("#CreateShop").trigger("reset");
			            $("#AddShop").modal("hide");
			            $("#tbldata").load("{{ 'test' }}");
				        $("#successMsg").html(data.successMsg).delay(2000).fadeOut();
			            setTimeout(function() {
						    location.reload();
						}, 2000);
					}
		        },
		    });
		});*/

		@if(!empty($shop))
			@foreach($shop as $index => $shops)
				$("#EditShop{{$shops->id}}").on('submit', function(e) {
			   		e.preventDefault();
			   		var id = "<?php echo $shops->id; ?>"
			   		$("#contactErr1").html("");
				    $("#emailErr1").html("");
			 		$.ajax({
				        type: 'put',
				        url: '{{ route("shop.update", $shops->id) }}',
				        data: $('#EditShop'+id).serialize(),
				        success: function(data) {
				            $("#contactErr1").html(data.contactErr);
				            $("#emailErr1").html(data.emailErr);
				            if(data.successMsg){
					            $("#tbldata").load("{{ 'test' }}");
						        $("#successMsg").html(data.successMsg).delay(2000).fadeOut();
					            $('.modal').removeClass('in');
				                $('.modal').attr("aria-hidden","true");
				                $('.modal').css("display", "none");
				                $('.modal-backdrop').remove();
				                $('body').removeClass('modal-open');
				                setTimeout(function() {
								    location.reload();
								}, 2000);
							}
				        },
				    });
				});
			@endforeach
		@endif
  	});
</script>
@endsection
