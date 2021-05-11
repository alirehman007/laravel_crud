@extends('layout')
	@section('content')
		<div class="row col-md-12">
			<div class=" row ">
			<div class="pull-right mt-3 ">
				
				
			</div>
		</div>
	</div>

		@if ($message=Session::get('success'))
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
		@endif
		<table class="table">
			<tr>
				<th>
					Table Images
				</th>
				{{-- <th>
					 Images Id
				</th> --}}
			</tr>
			@foreach ($product->images as $image)
			<tr>
				<td>	
					<img src="{{asset('images/' . $image->path)}}" width="300px" height="100px" alt="image">
				
				{{-- <a href="resources/gallery.blade.php" src="{{asset('images/' . $products->image)}}">View </a> --}}
				
			</td>
			
			 
	
</tr>
			@endforeach
		</table>
@endsection
	