

@extends('layout.layout')
@section('title','my profile')

@section('body')


<div class="container">
 <img src="{{asset('images/image.jpg')}}">
  <h2>Users</h2>
  <p>Info about users</p>  

 

        
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Age</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->age}}</td>
      </tr>
      
    </tbody>
  </table>
<button class="btn btn-danger"><a href="{{url('/logout')}}" style="text-decoration: none; color:black">Logout</a></button>
</div>

 

@endsection
	
