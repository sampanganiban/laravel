@extends('layouts.master')

@section('content')

<h1>Your Dashboard</h1>
<small>Currently logged in as {{ Auth::user()->name }}</small>

@include('dashboard.change_password')

@endsection
