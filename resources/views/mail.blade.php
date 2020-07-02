	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<p>Hello {{$name}} {{$surname}}</p>
		<a href ="{{url('/user/activate/' .$id.'/'.$hash)}}">Activate account</a>
	</body>
	</html>



