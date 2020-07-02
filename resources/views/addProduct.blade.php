@extends('layout.layout')
@section('title','add new product')

@section('body')
	<form method="post" action="{{url('addnewproduct')}}" enctype="multipart/form-data" class="w-25 p-3 bg-dark text-white mx-auto">
		{{csrf_field()}}
	@if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
    @endif
	Name:<input type="text" name="name" class="mb-3 form-control" value="{{old('name')}}">
	
	@if($errors->has('price'))
    <div class="error">{{ $errors->first('price') }}</div>
    @endif
	Price:<input type="text" name="price" class="mb-3 form-control" value="{{old('price')}}">

	@if($errors->has('count'))
    <div class="error">{{ $errors->first('count') }}</div>
    @endif
	Count:<input type="text" name="count" class="mb-3 form-control" value="{{old('count')}}">
	
	@if($errors->has('Description'))
    <div class="error">{{ $errors->first('description') }}</div>
    @endif
	Description:<input type="textarea" name="description" class="mb-3 form-control" value="{{old('description')}}">
	
	Photo:<input type="file" name="photo[]" class="mb-3 form-control" multiple="" accept="image/*" >
		
	
    <button class="btn btn-danger">Add</button>
	</form>
@endsection