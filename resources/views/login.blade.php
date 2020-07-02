<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
      <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
	  <title>Document</title>

</head>
<body>

<form action="{{url('/loginuser')}}" method="post" class="w-25 p-3 bg-dark text-white mx-auto">
	{{csrf_field()}}
	<h3 class="table-danger">{{Session::get('error')}}</h3>	
	  <div class="card-body">
             
    {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
	Email:<input type="email" name="email" class="mb-3 form-control" value="{{ old('email') }}">

	{!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
	Password:<input type="Password" name="password" class="mb-3 form-control" value="{{ old('password') }}">
	
    <button class="btn btn-danger">Login</button>
     <p class="float-right mt-2"><a href="{{ url('/forget')}}" class="text-success"> Forget password </a> </p>
     <p class="float-right mt-2"> Don't have an account?  <a href="{{ url('/signup')}}" class="text-success"> Register </a> </p>
</form>


</body>
</html>