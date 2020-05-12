<table id="table" class="table table-hover table-bordered table-striped">
    <thead id="table-sticky-header">
        <tr>
            <th>S.No.</th>
            <th>Shop Name</th>
            <th>Owner</th>
            <th>Contact Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
		@if(!empty($shop))
			@foreach($shop as $index => $shops)
		    <tr>
		        <td>{{ ++$index }}</td>
		        <td>{{ $shops->shop_name }}</td>
		        <td>{{ $shops->shop_owner_name }}</td>
		        <td>{{ $shops->contact_no }}</td>
		        <td>{{ $shops->email }}</td>
		        <td>
		        	<a href="#" class="modal-dlg" data-toggle="modal" data-target="#UpdateShop{{ $shops->id }}" title="Update Customer"><span class="glyphicon glyphicon-edit"></span></a>
		        </td>
		    </tr>

		    <!-- Update Modal -->
				<div class="modal fade" id="UpdateShop{{ $shops->id }}" role="dialog">
				    <div class="modal-dialog">
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">UPDATE SHOP</h4>
				        </div>
				        <div class="modal-body">
					        <form id="EditShop{{ $shops->id }}">
					        	@csrf
					        	@method('PUT')
							    <div class="form-group">
							        <label for="shop_name">Shop Name</label>
							        <input type="text" class="form-control" name="shop_name" value="{{ $shops->shop_name }}" placeholder="SHOP NAME">
							    </div>

							    <div class="form-group">
							        <label for="shop_owner_name">Shop Owner Name</label>
							        <input type="text" class="form-control" name="shop_owner_name" value="{{ $shops->shop_owner_name }}" placeholder="OWNER NAME">
							    </div>

							    <div class="row">
							    	<div class="col-md-6">
							    		<div class="form-group">
									        <label for="contact_no">Contact No.</label>
									        <input type="text" name="contact_no" class="form-control" value="{{ $shops->contact_no }}" placeholder="CONTACT NUMBER">
									        <div id="contactErr1" class="registeredMsg"></div>
									    </div>
									</div>
									<div class="col-md-6">
									    <div class="form-group">
									        <label for="email">Email Address</label>
									        <input type="email" name="email" value="{{ $shops->email }}" class="form-control" placeholder="EMAIL ADDRESS">
									        <div id="emailErr1" class="registeredMsg"></div>
									    </div>
							    	</div>
							    </div>

							    <div class="form-group">
							        <label for="shop_address">Shop Address</label>
							        <textarea name="shop_address" class="form-control"  placeholder="SHOP ADDRESS">{{ $shops->shop_address }}</textarea>
							    </div>

							    <button type="submit" name="submit" class="btn btn-primary" style="float: right">UPDATE</button>
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

<script type="text/javascript">
  	$(document).ready(function() {
      	$('#table').DataTable();
    });
</script>