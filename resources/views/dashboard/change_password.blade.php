<div>
	<form action="{{ url('dashboard/change_password') }}" method="post">
		
		{{ csrf_field() }}
		
		<div>
			<label for="current_password">Your Current Password: </label>
			<input type="password" name="current_password">
		</div>

		<div>
			<label for="password">New Password: </label>
			<input type="password" name="password">
		</div>

		<div>
			<label for="password_confirmation">Confirm New Password: </label>
			<input type="password" name="password_confirmation">
		</div>

		<input type="submit" value="Change Password!">

	</form>
	
	@if( Session::get('password_change') )
	<strong>{{ Session::get('password_change') }}</strong>
	@endif

	
	<ul>
		@foreach( $errors->all() as $error )
			<li>{{ $error }}</li>
		@endforeach
	</ul>

</div>