@extends('layouts.master')

@section('content')
	
	<h1>Edit: <em>{{$staffMember->first_name}} {{$staffMember->last_name}}</em></h1>

	<form action="{{ url('about/'.$staffMember->slug) }}" method="post">
		
		{{ csrf_field() }}

		<div>
			<label for="first_name">First Name: </label>
			<input type="text" value="{{$staffMember->first_name}}">
			{{$errors->first('first_name')}}
		</div>

		<div>
			<label for="last-name">Last Name: </label>
			<input type="text" value="{{$staffMember->last_name}}">
			{{$errors->first('last_name')}}
		</div>

		<div>
			<input type="submit" value="Change Details">
		</div>

	</form>

@endsection