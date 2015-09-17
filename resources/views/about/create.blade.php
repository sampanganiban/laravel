@extends('layouts.master')

@section('title', 'Create a new staff member')
@section('metaDesc', 'Create a new staff for the about page')

@section('content')
	<h1>Add a new Staff Member</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit!</p>
	
	<form action="{{ url('about') }}" method="post" enctype="multipart/form-data">
		
		{{-- Must be in every form otherwise laravel will reject it --}}
		{{ csrf_field() }}

		<div>
			<label for="first_name">First Name: </label>
			<input type="text" name="first_name" value="{{old('first_name')}}">
			{{-- If there are mulitple rules that the input field has broken, it will give you the first error that is equivalent to the error the user has made --}}
			{{$errors->first('first_name')}}
		</div>

		<div>
			<label for="last_name">Last Name: </label>
			<input type="text" name="last_name" value="{{old('last_name')}}">
			{{$errors->first('last_name')}}
		</div>

		<div>
			<label for="age">Age: </label>
			<input type="number" name="age" value="{{ old('age') }}" min="0" max="130" step="1">
			{{$errors->first('age')}}
		</div>

		<div>
			<label for="profile_image">Profile Image: </label>
			<input type="file" name="profile_image" id="profile_image">
			{{$errors->first('profile_image')}}
		</div>
	
		<input type="submit" value="Add New Staff">

	</form>

{{-- Loop that will display the error messages in an unordered list
	@if( count($errors) > 0 )
		<ul>
			@foreach($errors->all() as $error) 
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif --}}

@endsection











