<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function() {

	// Create some data
	$title    = 'About page';
	$metaDesc = 'Learn more about us';
	$staff    = [
					['name' => 'One', 'age'   => 34], 
					['name' => 'Two', 'age'   => 17], 
					['name' => 'Three']
				];

	$comments = [
					['heading' => 'Great Product', 'comment'  => 'I love this product!'],
					['heading' => 'Hello', 'comment' => 'Text']
				];

	return view('about')->with([
		'title'    => $title,
		'metaDesc' => $metaDesc,
		'staff'    => $staff,
		'comments' => $comments
	]);
});
