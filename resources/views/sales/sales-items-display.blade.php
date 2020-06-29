@if(session('item'))
<?php 
	$ItemTax = 0;
	$totalAmount = 0;
	foreach(session('item') as $id => $sales){ 
?>
	<tr id="id">
		<td>
	      <form action="{{ route('sales.destroy',$id) }}" method="POST">
	        @csrf
	        @method('DELETE')
	        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
	      </form>
		</td>
		<td id="item_number">{{ $sales['item_number'] }}</td>
		<td>{{ $sales['name'] }}</td>
		<td>{{ $sales['unit_price'] }}</td>
		<td>
			<input id="chngQty{{ $id }}" min="1" type="number" value="{{ $sales['quantity'] }}" style="width:50px" onchange="myFunction({{ $id }})" >
			<input type="hidden" name="salesItems_id" id="salesItems_id" value="{{ $id }}">
			<img src="https://konferencja.jemi.edu.pl/application-form/web/img/loader.gif" id="loading{{ $id }}" width="30px" class="load-cls" />
		</td> 
		<!-- <td>{{$discount = json_decode($sales['discounts'], true)['retail'] }}</td>  -->
		<td>{{$discount = 60 }}</td> 
		<td>
			<?php 
			 	$totalAmount += ($sales['unit_price'] - ($sales['unit_price'] / 100) * $discount) * $sales['quantity']; 

			 	echo ($sales['unit_price'] - ($sales['unit_price'] / 100) * $discount) * $sales['quantity']; 
			 	session()->put('totalAmount', $totalAmount);
			?>
		</td>
	</tr>

<?php } ?>
@else
	<tr>
		<td colspan="8">
			<div class="alert alert-dismissible alert-info">There are no Items in the cart.</div>
		</td>
	</tr>
@endif

