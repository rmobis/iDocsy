<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get(array('/', 'docs'), array(
	'as'		=> 'home',
	'uses'		=> 'docs@index'
));

Route::get('login', array(
	'as'		=> 'login',
	'uses'		=> 'admin@login'
));

Route::post('search', array(
	'as'		=> 'post_search',
	'do'		=> function() {
		return Redirect::to_route('search', Input::get('query'));
	}
));

Route::get('search/(:any)', array(
	'as'		=> 'search',
	'uses'		=> 'docs@search'
));

Route::post('login', 'admin@check');

Route::get('hash/(:any)', function($pw) {
	exit(Hash::make($pw));
});

Route::get('logout', array(
	'as'		=> 'logout',
	'do'		=> function() {
		Auth::logout();
		return Redirect::to_route('home');
	}
));

Route::get('new', array(
	'as'		=> 'new_item',
	'before'	=> 'auth',
	'uses'		=> 'admin@new'
));

Route::get('edit/module/(:num)', array(
	'as'		=> 'edit_module',
	'before'	=> 'auth',
	'uses'		=> 'admin@edit_module'
));

Route::get('edit/item/(:num)', array(
	'as'		=> 'edit_item',
	'before'	=> 'auth',
	'uses'		=> 'admin@edit_item'
));

Route::get('(:any)/(:any)', array(
	'as'		=> 'item',
	'uses'		=> 'docs@item'
));

Route::get('(:any)', array(
	'as'		=> 'module',
	'uses'		=> 'docs@module'
));


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function() {
	return Response::error('404');
});

Event::listen('500', function() {
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function() {
	// Do stuff before every request to your application...
});

Route::filter('after', function($response) {
	// Do stuff after every request to your application...
});

Route::filter('csrf', function() {
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function() {
	if (Auth::guest()) {
		return Redirect::to_route('login')
					   ->with('backlink', URL::current());
	}
});