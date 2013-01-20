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
						->nest('subpage', 'subpages.notfound');
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
						->nest('subpage', 'subpages.notfound');
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
						->nest('subpage', 'subpages.notfound');
		}

		// Else, display module info
		return $this->layout
					->nest('subpage', 'subpages.module',
			 			array('module' => $module)
			 		);
	}


	// Extremely poor, messy and fucked up implementation of a search engine
	public function action_search($query = '') {
		// If it was a typeahead suggestion, we try to automatically redirect to it
		if (Input::get('exactItem') === 'true') {
			$item = Item::with('module')
						->where('name', '=', $query)
						->first();

			if ($item) {
				return Redirect::to_route('item', array($item->module->link, $item->link));
			}
		}

		$queryTerms = array_filter(
			explode(' ', $query),
			function($v) {
				return $v !== '';
			}
		);

		// No terms, no items to show.
		if (count($queryTerms) === 0) {
			return $this->layout
						->nest('subpage', 'subpages.search',
							array('valid' => false)
						);
		}

		$results = array();

		// One term only, we assume it's a module's or item's name/link
		if (count($queryTerms) === 1) {
			$queryTerm = $queryTerms[0];

			// Get all items and modules with the name/link equal to the query term
			$results = array_merge(
				Item::with(array('module', 'headings'))
					->where('name', 'LIKE', $queryTerm)
					->or_where('link', '=', $queryTerm)
					->get(),

				Module::with('headings')
					  ->where('name', 'LIKE', $queryTerm)
					  ->or_where('link', '=', $queryTerm)
					  ->get()
			);
		}

		// Two terms, we assume it's module's AND item's name/link
		if (count($queryTerms) === 2) {
			// Get all models which the link/name matches the terms given
			$modules = Module::with(array('items', 'items.headings'))
							 ->where('name', 'LIKE', '%'.$queryTerms[0].'%')
							 ->or_where('name', 'LIKE', '%'.$queryTerms[1].'%')
							 ->get();

			$results = $modules;

			// Adds all items which the link/name matches the terms given
			foreach ($modules as $module) {
				$results = array_merge(
					$results,
					array_filter(
						$module->items,
						function($item) use (&$queryTerms) {
							return preg_match('/'.implode('|', $queryTerms).'/i', $item->name . ' ' . $item->link);
						}
					)
				);
			}
		}

		// Not enough results, it's time to be a little more flexive, let's search on headings
		if (count($results) < 5) {
			// We create all queries with reset_where() method, only to be given access to the query object.
			$modules 				= Module::with('headings');
			$items					= Item::with(array('module', 'headings'));
			$headings				= Heading::with(array('item', 'item.headings'));
			$sub_headings			= SubHeading::with(array('heading', 'heading.item', 'heading.item.headings'));
			$module_headings		= ModuleHeading::with(array('module', 'module.headings'));
			$module_sub_headings	= ModuleSubHeading::with(array('heading', 'heading.module', 'heading.module.headings'));

			// Add each query term individually
			foreach ($queryTerms as $queryTerm) {
				$likeTerm = '%'.$queryTerm.'%';

				$modules					= $modules->where('name', 'LIKE', $likeTerm)
													  ->or_where('link', 'LIKE', $likeTerm);

				$items						= $items->where('name', 'LIKE', $likeTerm)
													->or_where('link', 'LIKE', $likeTerm);

				$headings					= $headings->where('html_content', 'LIKE', $likeTerm);

				$sub_headings				= $sub_headings->where('html_content', 'LIKE', $likeTerm);

				$module_headings			= $module_headings->where('html_content', 'LIKE', $likeTerm);

				$module_sub_headings		= $module_sub_headings->where('html_content', 'LIKE', $likeTerm);
			}

			// We first pull only modules and items
			$results = array_merge(
				$modules->get(),
				$items->get()
			);

			// Get headings results if we haven't got enough results yet
			// 5 is just an arbitrary number, we should prolly tweak it later
			if (count($results) < 5) {
				$newResults = array_merge(
					$headings->get(),
					$module_headings->get()
				);

				$results = array_merge(
					$results,
					array_map(
						function($v) {
							if ($v instanceof Heading) {
								return $v->item;
							} elseif ($v instanceof ModuleHeading) {
								return $v->module;
							}
						},
						$newResults
					)
				);

				// If we still don't have enough results, get from sub headings
				if (count($results) < 5) {
					$newResults = array_merge(
						$sub_headings->get(),
						$module_sub_headings->get()
					);

					$results = array_merge(
						$results,
						array_map(
							function($v) {
								if ($v instanceof SubHeading) {
									return $v->heading->item;
								} elseif ($v instanceof SubModuleHeading) {
									return $v->heading->module;
								}
							},
							$newResults
						)
					);
				}
			}

			// Remove repeated entries that may have been added due to loading all models
			$keys = array();
			$results = array_filter(
				$results,
				function($v) use (&$keys) {
					$id = get_class($v).$v->id;
					if (array_search($id, $keys) === false) {
						$keys[] = $id;
						return true;
					} else {
						return false;
					}
				}
			);
		}


		// If there's only one model/item matching our criteria and the search was sent through the sidebar searchbox,
		// we simply redirect to it.
		if (Input::get('exactJump') && count($results) === 1) {
			$result = $results[0];
			if ($result instanceof Module) {
				return Redirect::to_route('module', array($result->link));
			} else {
				return Redirect::to_route('item', array($result->module->link, $result->link));
			}
		}

		// Show all results on search page
		return $this->layout
					->nest('subpage', 'subpages.search',
						array(
							'valid'		=> true,
							'query'		=> $query,
							'results'	=> $results
						)
					);
	}
}
