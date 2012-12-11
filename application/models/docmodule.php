<?php

class DocModule extends Eloquent {
	public static $table = 'modules';

	public function sections() {
		return $this->has_many('DocSection', 'module_id')
					->order_by('id');
	}
}
