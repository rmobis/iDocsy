<?php

class DocItemData extends Eloquent {
	public static $table = 'item_data';

	public function item() {
		return $this->belongs_to('DocItem');
	}
}
