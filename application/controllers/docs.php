<?php

class Docs_Controller extends Base_Controller {
	public function action_index() {
		return $this->layout
					->nest('subpage', 'subpages.home');
	}

	public function action_item($module_link, $item_link) {
		$module = Module::where('link', '=', $module_link)
						->first();

		// If module doesn't exist, we quit
		if (is_null($module)) {
			return $this->layout
						->nest('subpage', 'subpages.notfound',
							array(
								'module'	=> $module_link,
								'item'		=> $item_link
							)
						);
		}

		$item = Item::with(array(
						'module',
						'headings',
						'headings.sub_headings'
					))
					->where('module_id', '=', $module->id)
					->where('link', '=', $item_link)
					->first();

		// If item doesn't exist, we quit
		if (is_null($item)) {
			return $this->layout
						->nest('subpage', 'subpages.notfound',
							array(
								'module'	=> $module_link,
								'item'		=> $item_link
							)
						);
		}

		// Else, display item info
		return $this->layout
					->nest('subpage', 'subpages.item',
			 			array('item' => $item)
			 		);
	}

	public function action_module($module_link) {
		$module = Module::where('link', '=', $module_link)
						->first();

		// If module doesn't exist, we quit
		if (is_null($module)) {
			return $this->layout
						->nest('subpage', 'subpages.notfound',
							array(
								'module'	=> $module_link,
								'item'		=> $item_link
							)
						);
		}

		// Else, display module info
		return $this->layout
					->nest('subpage', 'subpages.module',
			 			array('module' => $module)
			 		);
	}

	public function action_search($query) {
		exit('Me wanna search for: ' . $query);
	}
}
