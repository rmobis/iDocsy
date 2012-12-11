<?php

class DocSection extends Eloquent {
	public static $table = 'sections';

	public function module() {
		return $this->belongs_to('DocModule');
	}

	public function items($full = false) {
		if ($full) {
			return $this->has_many('DocItem', 'section_id')
						->order_by('name');
		} else {
			return $this->has_many('DocItem', 'section_id')
						->order_by('name')
						->select(array('name', 'link'));
		}
	}
}
