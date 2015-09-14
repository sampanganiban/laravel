@extends('layouts.master')

@section('title', $title)
@section('meta-desc', $metaDesc)

@section('content')
	
	<h1>About page</h1>
	
	<ul>
		@foreach($staff as $staffMember)
			<li>{{ $staffMember['name'] }} is {{ $staffMember['age'] or 'unknown' }} years old
	
				@if(isset($staffMember['age']))
					
					@if($staffMember['age'] <= 21 ) 
						Adult.
					@else
						Child.
					@endif

				@endif

			</li>
		@endforeach
	</ul>

	@forelse($comments as $comment)
		<div>
			{!!$comment['heading']!!}
			<br>
			{!!$comment['comment']!!}
		</div>
		
		@empty
		<div>
			No comments.
		</div>
	@endforelse

@endsection

@section('footer')

	@parent 
		
	<ul>
		<li>Phone: 123456789</li>
	</ul>

@endsection











