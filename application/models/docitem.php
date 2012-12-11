<?php

class DocItem extends Eloquent {
	public static $table = 'items';

	public function section() {
		return $this->belongs_to('DocSection');
	}
}
