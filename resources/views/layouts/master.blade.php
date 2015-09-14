<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('meta-desc')">
</head>
<body>

	<!-- We want to yield or display content based on the master view -->
	@yield('content')
	
	{{-- Section for the footer. We can manipulate it later if we want --}}
	@section('footer')
	<footer>
		<p>Some Copyrights</p>
	</footer>
	@show
	
</body>
</html>