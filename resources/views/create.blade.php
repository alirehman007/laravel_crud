@push('styles')
    <link href="{{ asset('css/mobiscroll.javascript.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/mobiscroll.javascript.min.jsscripts.js') }}"></script>
@endpush
<!-- <link rel="stylesheet" type="text/css" href="css/style.min.css">
<script src="js/custom.js">
	mobiscroll.settings = {
    theme: 'ios',
    themeVariant: 'light'
};

$(function () {

    $('#demo').mobiscroll().color({
        select: 'single'
    });

    $('#multi').mobiscroll().color({
        select: 'multi',
        headerText: 'Pick your favorite colors'
    });

});
</script> -->
@extends('layout');
@section('content')
<div class="row">
<div class="col-lg-12 pull-left">
<h2> Add products</h2>
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
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data"> 
	@csrf
		<div class="form-group col-12 left">
		<label>Product name:</label>
		<input type="text" name="name" required="" placeholder="enter your name" class="form-control">
	</div>
	<div class="form-group col-12 left">
		<label>Product Price:</label>
		<input type="text" name="price" required="" placeholder="enter your name" class="form-control">
	</div>
	
	<div class="col-12 left">
		<label>product type:</label>
		<input type="radio" name="product_type" value="Perishable">Perishable
		<input type="radio" name="product_type" value="breakable">Breakable
		<input type="radio" name="product_type" value="virtual" >Virtual
		
	</div>
	
	<div class="col-12 left">
		<label>product weight</label>
		<input type="text" name="weight" class="form-control">
	</div>
	<div class="col-12 left">
		<label>Description:</label>
		<textarea class="form-control" name="description"></textarea>
	</div>
	{{-- <div mbsc-form>
    <div class="mbsc-form-group">
        <div class="mbsc-form-group-title">Single select & multiple select</div>
        <label>
            One color
            <input mbsc-input id="demo" placeholder="Please Select..." />
        </label>
        <label>
            Multiple
            <input mbsc-input id="multi" type="text" placeholder="Please Select..." />
        </label>
    </div>
</div> --}}
	 <div class="col-12 left">
		<label >Product color</label>
		<select class="form-control" name="color">
			<option>Red</option>
			<option>Yellow</option>
			<option>blue</option>
			<option>black</option>
			<option>Green</option>
		</select>
	</div>
	<div class="col-12 left">
		<label>product image</label>
		<input type="file" name="image[]"  id="logo"class="form-control" multiple>
	</div>
	<div class="col-12 mt-3">
		<input type="submit" name="submit" class="btn btn-danger">
		<input type="cancle" name="cancle" value="Cancle" class="btn btn-light">
	</div>

	</form>
</div>
@endsection