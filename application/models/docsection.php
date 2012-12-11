<?php

class DocSection extends Eloquent {
	public static $table = 'sections';

	public function module() {
		return $this->belongs_to('DocModule');
	}

	public function items($full = false) {
		return $this->has_many('DocItem', 'section_id')
					->order_by('name');
	}
}
