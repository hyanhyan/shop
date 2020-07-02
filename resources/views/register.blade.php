<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	  <title>Document</title>

</head>
<body>
	
<form action="{{url('/signup')}}" method="post" class="w-25 p-3 bg-dark text-white mx-auto">
	{{csrf_field()}}
	@if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
    @endif
	Name:<input type="text" name="name" class="mb-3 form-control" value="{{old('name')}}">
		@if($errors->has('surname'))
    <div class="error">{{ $errors->first('surname') }}</div>
    @endif
	Surname:<input type="text" name="surname" class="mb-3 form-control" value="{{old('surname')}}">
		@if($errors->has('age'))
    <div class="error">{{ $errors->first('age') }}</div>
    @endif
	Age:<input type="text" name="age" class="mb-3 form-control" value="{{old('age')}}">
		@if($errors->has('email'))
    <div class="error">{{ $errors->first('email') }}</div>
    @endif
	Email:<input type="email" name="email" class="mb-3 form-control" value="{{old('email')}}">
		@if($errors->has('password'))
    <div class="error">{{ $errors->first('password') }}</div>
    @endif
	Password:<input type="Password" name="password" class="mb-3 form-control" value="{{old('password')}}">
		
	Pasword-confirm:<input type="password" name="password_confirmation" class="mb-3 form-control" value="{{old('password_confirmation')}}">
    <button class="btn btn-danger">Sign up</button>
</form>

{{-- <h1>

	@if($errors->any())
	<div>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
</h1> --}}
 
  </body>	

</html>