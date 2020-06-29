<?php //print_r(session('cart')); die; ?>
@if(session('cartCustomer'))
{{-- {{dd(session('cartCustomer'))}} --}}
@foreach(session('cartCustomer') as $id => $sales)

      <td><b>Total Spent:</b></td><br><br>
	  <td><b> Name:-</b><span id="customer_name">{{ $sales['customer_name'] }}</span></td>
	  <td><input type="hidden" id="customer_id" name="customer_id" value="{{ $id }}"></td>
	<form action="{{ route('customer-cert-destroy',$id) }}" method="POST">
        @csrf
        {{-- @method('DELETE') --}}
        <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
    </form>
@endforeach
		{{-- {{dd($sales)}} --}}

	
@endif

