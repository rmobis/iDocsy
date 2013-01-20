<?php

class Admin_Controller extends Base_Controller {
	public function action_login() {
		return $this->layout
					->nest('subpage', 'subpages.login');
	}

	public function action_check() {
		$userinfo = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($userinfo)) {
			if (Input::has('backlink')) {
				return Redirect::to(Input::get('backlink'));
			} else {
				return Redirect::to_route('home');
			}
		} else {
			Session::keep('backlink');
			return Redirect::to_route('login')
						   ->with('login_errors', true);
		}
	}
	public function action_edit_item($item) {
		exit('me wants to edit item with id: ' . $item);
	}

	public function action_edit_module($module) {
		exit('me wants to edit module with id: ' . $module);
	}

	public function action_new_item() {
		exit('me wants to add a new item');
	}

	public function action_new_module() {
		return $this->layout
					->nest('subpage', 'subpages.newmodule');
	}
}