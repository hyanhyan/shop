<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Hello {{$name}} </h1>
	@foreach($user as $u)
	<li>{{$u}}</li>
	@endforeach

	@foreach($info as $p)
	{{-- @if($p['age']>18)
	<div style="background-color: green">
	<li>{{$p['name'] . ' ' .$p['surname']. ' ' .$p['age']}}</li>
</div>
@else
<div style="background-color: lightblue">
	<li>{{$p['name'] . ' ' .$p['surname']. ' ' .$p['age']}}</li>
</div>
@endif --}}
	<div style="background-color:{{ ($p['age']>18)? 'green':'blue'}}">
   <li>{{$p['name'] . ' ' .$p['surname']. ' ' .$p['age']}}</li>
</div>
	@endforeach
</body>
</html>