@extends('layout');
@section('content')
<div class="row">
<div class="col-lg-12 pull-left">
<h2> Edit products</h2>
</div>
<div class="pull-right">
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger"> 
<ul>
@foreach ($errors->all() as $error)
<li>
{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<div class="row">
<form action="{{route('products.update',$products->id)}}" method="POST"> 
	@csrf
		<div class="form-group col-12 left">
		<label>Product name:</label>
		<input type="text" value="{{$products->name}}" name="name" placeholder="enter your name" class="form-control">
	</div>
	<div class="form-group col-12 left">
		<label>Product Price:</label>
		<input type="text" name="price" placeholder="enter your name" class="form-control" value="{{$products->price}}">
	</div>
	
	<div class="col-12 left">
		<label>product type:</label>
		<input type="radio" name="product_type" value="Perishable" {{ $products->product_type == 'Perishable' ? 'checked' : '' }} >Perishable
		<input type="radio" name="product_type" value="breakable" {{ $products->product_type == 'breakable' ? 'checked' : '' }}>Breakable
		<input type="radio" name="product_type" value="virtual" {{ $products->product_type == 'virtual' ? 'checked' : '' }} >Virtual
		
	</div>
	<div class="col-12 left">
		<label>product image</label>
		<input type="file" name="image" class="form-control" value="{{$products->image}}">
	</div>
	<div class="col-12 left">
		<label>product weight</label>
		<input type="text" name="weight" class="form-control" value="{{$products->weight}}">
	</div>
	<div class="col-12 left">
		<label>Description:</label>
		<textarea class="form-control" name="description" value="{{$products->description}}"></textarea>
	</div>
	<div class="col-12 left">
		<label >Product color</label>
		<select class="form-control" name="color" >
			@foreach($products as $team)
			<option value="{{$team['group_id']}}" {{$team['comic_group_name']}}>Red</option>
			@endforeach
			@foreach($products as $team)
			<option value="{{$team['group_id']}}" {{$team['comic_group_name']}}>Yellow</option>
			@endforeach
			@foreach($products as $team)
			<option value="{{$team['group_id']}}"{{$team['comic_group_name']}}>blue</option>
			@endforeach
			<option>black</option>
			<option>Green</option>
		</select>
	</div>
	<div class="col-12 mt-3">
		<input type="submit" name="submit" value="Update" class="btn btn-danger">
		<input type="cancle" name="cancle" value="Cancle" class="btn btn-light">
	</div>

	</form>
</div>
@endsection