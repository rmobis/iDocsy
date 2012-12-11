<?php

class DocItem extends Eloquent {
	public static $table = 'items';

	public function section() {
		return $this->belongs_to('DocSection');
	}

	public function data() {
		return $this->has_one('DocItemData', 'item_id');
	}

	public function return_value() {
		return $this->has_one('ReturnValue', 'item_id');
	}

	public function parameters() {
		return $this->has_many('Parameter', 'item_id')
					->order_by('id');
	}
}
