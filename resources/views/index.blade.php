@extends('layout')
	@section('content')
		<div class="row col-md-12">
			<div class=" row ">
			<div class="pull-right mt-3 ">
				<a class="btn btn-danger" href="{{route ('products.create')}}">Add Products</a>
				<h1> All Products Record</h1>
			</div>
		</div>
	</div>

		@if ($message=Session::get('success'))
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
		@endif
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Price</th>
				
				<th>project_type</th>
				 

				<th>weight</th>
				<th>color</th>
				<th>Description</th>
				<th>project images</th> 
				<th> Option</th>
			</tr>
			@foreach ($products as $products)
			<tr>
				<td>
					{{$products->id}}
				</td>
				<td>
					{{$products->name}}
				</td>
				<td>
					{{$products->price}}
				</td>
				<td>
					{{$products->product_type}}
				</td>
				 
				<td>
					{{$products->weight}}
				</td>
				<td>
					{{$products->color}}
				</td>
				<td>
					{{$products->description}}
				</td>
				{{-- <td>
					{{$products->image}}
				</td> --}}
				<td>
					{{-- <img src="{{asset('images/' . $products->image)}}" width="100px" height="100px" alt="image"> --}}
				
				{{-- <a href="resources/gallery.blade.php" src="{{asset('images/' . $products->image)}}">View </a> --}}
				<form >
					{{-- <a class="btn btn-success" href="{{route('image.view',$products->id)}}  ">View</a> --}}
					<a class="btn btn-success"  href="{{ route('image.view', $products->id) }}">View</a>
					
				</form>
	

				
			</td>
			
			 <td>
	<form method="post" action="{{route('products.destroy',$products->id)}}">
	<a class="btn btn-primary" href="{{route('products.edit', $products->id)}}">Edit</a>
	{{csrf_field()}}
	
	{{method_field('Delete')}}
	<input type="submit" class="btn btn-danger divelete-user" value="Delete" name="">
			</form>
		</td>
</tr>
			@endforeach
		</table>
@endsection
	