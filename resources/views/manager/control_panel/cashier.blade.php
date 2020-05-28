<div class="content" style="margin-top:30px;">
   <div class="row">
   	  <div class="col-md-8">
   	  	<span class="successMsg" id="successMsg"></span>
   	  </div>
      <div class="col-md-4">
         <div class="form-group">
            <select class="form-control" id="location_id" onchange="cashier(this);">
               <option value="" selected="" disabled="">Select Location</option>
               	@if(!empty($shop))
               		@foreach($shop as $shops)
		               	<option value="{{ $shops->id }}">{{ $shops->shop_name }}</option>
		            @endforeach
		        @endif
            </select>
         </div>
      </div>

      <div class="clearfix"></div>
      <hr>
      @if(!empty($shop))
            @foreach($shop as $shops)
		      <div id="shop_cpane{{$shops->id}}" class="hideDiv" style="display: none">
		         <div class="row">
		            <div class="col-md-12">
		               <form id="updateTime{{$shops->id}}">
		               	  @csrf
		                  <div class="row">
		                     <div class="col-sm-4 col-md-4">
		                        <label>Shop Open Time</label>
		                        <input type="hidden" name="type" value="timing">
		                        <input type="hidden" name="shop_id" value="{{$shops->id}}">
		                        <input type="text" name="open_time" class="form-control timepicker"> 
		                     </div>
		                  </div>
		                  <div class="row">
		                     <div class="col-sm-4 col-md-4">
		                        <label>Shop Close Time</label>
		                        <input type="text" name="close_time" class="form-control timepicker">        
		                     </div>
		                  </div>
		                  <div class="row">
		                     <div class="col-sm-2 col-md-2" style="padding-top: 10px;padding-bottom: 10px;">
		                        <button type="submit" class="btn btn-info">Submit</button>
		                     </div>
		                  </div>
		               </form>
		            </div>
		         </div>
		         <div class="row">
		            <div class="col-sm-4">
		               <div class="list-group-item disabled" style="background-color: #132639;color:#fff;font-size:15px;">
		                  <span class="glyphicon glyphicon-user" style="color: white;margin-right:10px;"></span>
		                  Cashiers
		                  <button class="btn btn-xs btn-info col-sm-3 col-sm-offset-1 pull-right modal-dlg"  data-toggle="modal" data-target="#add_cashier{{ $shops->id }}">Add Cashier</button>
		               </div>
		               <div id="CashierDetails"></div>
		            </div>
		            <div class="col-sm-7 pull-right">
		               <div style="background: #2c3e50; padding: 10px 15px;" class="col-sm-12">
		                  <span style="color:#fff;font-size: 15px;padding-left:0" class="col-sm-3 ">Shop Incharge
		                  </span>
		                  <select class="col-sm-6" id="shop_incharge{{$shops->id}}">
		                  	<option value="" selected="" disabled="">Select Incharge</option>
		                  	@if(!empty($cashier))
		                  		@foreach($cashier as $cashiers)
		                  			<option value="{{ $cashiers->id }}">{{ $cashiers->name }}</option>
		                  		@endforeach
		                  	@endif
		                  </select>
		                  <div class="btn btn-xs btn-info col-sm-2 col-sm-offset-1 pull-right" onclick="save_changes('incharge', '{{$shops->id}}');">Save Incharge
		                  </div>
		               </div>
		               <div>
		                  <textarea name="address{{$shops->id}}" id="address{{$shops->id}}"></textarea>
		               </div>
		               <div><br>
		                  <span class="btn btn-md btn-info col-sm-2 col-sm-offset-10" onclick="save_changes('address', '{{$shops->id}}');">Save Address</span>
		               </div>
		               <br>
		               <div class="clearfix"></div>
		               <br>
		               <div>
		                  <textarea name="tnc{{$shops->id}}" id="tnc{{$shops->id}}"></textarea>
		               </div>
		               <div class="col-sm-12"> <br>
		                  <span class="btn btn-md btn-info col-sm-2 col-sm-offset-10" onclick="save_changes('tnc', '{{$shops->id}}');">Save T&amp;C</span>
		               </div>
		               <br>
		            </div>
		         </div>
		         <br><br>
		      </div>

	<!-- Add Modal -->
	<div class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" id="add_cashier{{ $shops->id }}" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">ADD Cashier</h4>
	        </div>
	        <div class="modal-body">
		        <form id="cashierAdd{{$shops->id}}">
		        	@csrf
				    <div class="form-group">
				        <label>Location</label>
				        <input type="text" class="form-control" readonly="" value="{{ $shops->shop_name }}">
				        <input type="hidden" name="type" value="cashierModal">
				        <input type="hidden" name="shop_id" value="{{ $shops->id }}">
				    </div>

				    <div class="form-group">
				        <label>Cashier</label>
				        <select class="form-control" name="cashier_id[]" multiple="" id="cashier_id{{ $shops->id }}">
				        	@if(!empty($cashier))
		                  		@foreach($cashier as $cashiers)
		                  			<option value="{{ $cashiers->id }}">{{ $cashiers->name }}</option>
		                  		@endforeach
		                  	@endif
				        </select>
				    </div>

				    <button type="submit" class="btn btn-primary" style="float: right">ADD</button>
				</form>
	        </div>
	      </div>   
	    </div>
	</div>
	<!-- Modal -->

			<script type="text/javascript">
				$(document).ready(function(){
					CKEDITOR.replace( 'tnc{{$shops->id}}' );
					CKEDITOR.replace( 'address{{$shops->id}}' );

				    $('.cashier_toggle').bootstrapToggle();
				    $('.timepicker').datetimepicker({format: 'HH:mm:ss'});

				    $('#updateTime{{$shops->id}}').on('submit', function(e){
				    	e.preventDefault();
				    	$.ajax({
				    		method: 'post',
				    		url: 'cashier_shop',
				    		data: $('#updateTime{{$shops->id}}').serialize(),
				    		success: function(data){
				    			// console.log(data);
				    			$("#successMsg").html(data.successMsg).delay(4000).fadeOut();
			      				/*setTimeout(function() {
								    location.reload();
								}, 2000);*/
				    		}
				    	});
				    });

				    $('#cashierAdd{{$shops->id}}').on('submit', function(e){
				    	e.preventDefault();
				    	$.ajax({
				    		method: 'post',
				    		url: 'cashier_shop',
				    		data: $('#cashierAdd{{$shops->id}}').serialize(),
				    		success: function(data){
				    			// console.log(data);
				    			$('#cashierAdd'+id).trigger("reset");
			      				$('#add_cashier'+id).modal("hide");
				    			$("#successMsg").html(data.successMsg).delay(4000).fadeOut();
			      				/*setTimeout(function() {
								    location.reload();
								}, 2000);*/
				    		}
				    	});
				    });
				});

				document.getElementById("shop_incharge{{$shops->id}}").onchange = function(){
					sessionStorage.setItem('incharge_val', this.value);
				};

				function save_changes(formType, locID){
					var _token = $('input[name="_token"]').val();
					if(formType == 'incharge'){
						var type = formType;
						var formData = sessionStorage.getItem('incharge_val');
					}
					if(formType == 'address'){
						var type = formType;
						var formData = CKEDITOR.instances['address'+locID].getData();
					}
					if(formType == 'tnc'){
						var type = formType;
						var formData = CKEDITOR.instances['tnc'+locID].getData();
					}
					$.ajax({
			    		method: 'post',
			    		url: 'cashier_shop',
			    		data: { shop_id:locID, type:type, formData:formData, _token:_token },
			    		success: function(data){
			    			// console.log(data);
			    			$("#successMsg").html(data.successMsg).delay(4000).fadeOut();
		      				/*setTimeout(function() {
							    location.reload();
							}, 2000);*/
			    		}
			    	});
				}

			</script>
		    @endforeach
	  @endif
   </div>
</div>

<script type="text/javascript">
	function cashier(){
		var shop_id = document.getElementById("location_id").value;
		var _token = $('input[name="_token"]').val();
		$(".hideDiv").hide();
		document.getElementById("shop_cpane"+shop_id).style.display = "block";
		$.ajax({
	        type: "post",
	        url: "fetch",
	        data: { shop_id:shop_id, _token:_token },                
	        success: function(res){ 
	        	CKEDITOR.instances['address'+shop_id].setData(res.address);
	        	CKEDITOR.instances['tnc'+shop_id].setData(res.tnc);
	        	$("input[name=open_time]").val(res.open_time);
	        	$("input[name=close_time]").val(res.close_time);
	        	$('#shop_incharge'+shop_id+' option[value="'+res.incharge_id+'"]').attr("selected", "selected");
	        	$.each(res.cashier_id, function(i,e){
				    $("#cashier_id"+shop_id+" option[value='" + e + "']").prop("selected", true);
				});

				$("#CashierDetails").empty();
				$.each(res.cashier_data, function(i,e){
				    var key = e[0];
					$("#CashierDetails").append('<div class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><span id="cashier_title_'+key.id+'" class=""> '+key.name+' </span><a data-toggle="collapse" href="#collapse_'+key.id+'" class="fa fa-arrow-down pull-right arrow"></a></h4></div><div id="collapse_'+key.id+'" class="panel-collapse collapse"><ul class="list-group"><li class="list-group-item col-sm-8"><div class="form-group"><label for="name">Name : </label> '+key.name+' </div></li><div class="clearfix"></div><li class="list-group-item"><div class="form-group"><label for="pwd">Password:</label> '+key.webkey+' </div></li><li class="list-group-item"><div class="form-group"><label for="phone">Contact Number:</label> '+key.contact_no+' </div></li></ul></div><div class="clearfix"></div></div></div>');
				});
	        }
    	});
	}
</script>
