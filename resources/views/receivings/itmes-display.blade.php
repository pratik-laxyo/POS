
<?php //print_r(session('cart')); die; ?>
@if(session('receivingsItems'))
@foreach(session('receivingsItems') as $id => $receivings)
	<tr>
			<td>
		      <form action="{{ route('receivings.destroy',$id) }}" method="POST">
		        @csrf
		        @method('DELETE')
		        <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		      </form>
			</td>
			<td>{{ $receivings['item_number'] }}</td>
			<td>{{ $receivings['name']}}</td>
			<td>{{ $receivings['unit_price']}}</td>
			<td>{{ $receivings['quantity']}}</td>
			<td>
				<input id="chngQty{{ $id }}" min="1" type="number" value="{{ $receivings['quantity'] }}" style="width:50px" onchange="myFunction({{ $id }})"> {{-- {{ $purchase['item_name']->unit->name }} --}}
				<input type="hidden" name="receivings_id" id="receivings_id" value="{{ $id }}">
				<img src="https://konferencja.jemi.edu.pl/application-form/web/img/loader.gif" id="loading{{ $id }}" width="30px" class="load-cls" />
			</td>
			<td><?php 
				$i = 1;
				$total_price =0;
				while ($i <= $receivings['quantity'] ) {

			echo $total_price += $receivings['unit_price']; 
	  
			$i++;		
		}  ?></td>
	</tr>
@endforeach

@else
	<tr>
		<td colspan="8">
			<div class="alert alert-dismissible alert-info">There are no Items in the cart.</div>
		</td>
	</tr>
@endif

