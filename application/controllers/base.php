<?php

class Base_Controller extends Controller {
	public $layout = 'layouts.main';


	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters) {
		return Response::error('404');
	}

	public function __construct() {
		parent::__construct();

		Asset::add('jQuery', 'js/jquery.js')
			 ->add('Bootstrap', 'js/bootstrap.js', 'jQuery')
			 ->add('Ellipsis', 'js/jquery.ellipsis.js', 'jQuery')
			 ->add('ScrollTo', 'js/jquery.scrollTo.js', 'jQuery')
			 ->add('Prettify', 'js/prettify.js')
			 ->add('Prettify Lua', 'js/prettify.lua.js');

		Asset::add('Bootstrap', 'css/bootstrap.css')
			 ->add('Main Styles', 'css/styles.css', 'Bootstrap')
			 ->add('Bootstrap Resp', 'css/bootstrap.resp.css', 'Main Styles')
			 ->add('Prettify', 'css/prettify.css');
	}
}