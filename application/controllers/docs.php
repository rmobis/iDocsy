<?php

class Docs_Controller extends Base_Controller {
	public function action_index() {
		$first_item = DocItem::with(array('section', 'section.module', 'data', 'parameters', 'return_value'))
							 ->first();

		return View::make('layouts.main')
				   ->with('item', $first_item);
	}
}
