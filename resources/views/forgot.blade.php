<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action=" {{url('/forgetPassword')}}" method="post">
		{{csrf_field()}}
		<input type="email" name="" id="email">
		<button type="submit">Submit</button>
	</form>
</body>
</html>