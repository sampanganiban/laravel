@extends('layouts.master')

@section('content')
	
	<h1>Edit: <em>{{$staffMember->first_name}} {{$staffMember->last_name}}</em></h1>

	<form action="{{ url('about/'.$staffMember->slug) }}" method="post" enctype="multipart/form-data" novalidate>
		
		{{ csrf_field() }}

		{{-- the patch method tells laravel that we are making modification --}}
		<input type="hidden" name="_method" value="patch">

		<div>
			<label for="first_name">First Name: </label>
			<input type="text" name="first_name" value="{{ old('first_name') ? old('first_name') : $staffMember->first_name }}">
			{{$errors->first('first_name')}}
		</div>

		<div>
			<label for="last-name">Last Name: </label>
			<input type="text" name="last_name" value="{{ old('last_name') ? old('last_name') : $staffMember->last_name }}">
			{{$errors->first('last_name')}}
		</div>

		<div>
			<label for="age">Age: </label>
			<input type="number" name="age" value="{{ old('age') ? old('age') : $staffMember->age }}" min="0" max="130" step="1">
			{{$errors->first('age')}}
		</div>
	
		<img src="/img/staff/{{ $staffMember->profile_image }}" alt="Profile image of {{$staffMember->first_name}} {{$staffMember->last_name}}">	

		<div>
			<label for="profile_image">New Profile Image:  <small>(optional)</small></label>
			<input type="file" name="profile_image">
		</div>
		
		<div>
			<input type="submit" value="Change Details">
		</div>

	</form>

@endsection