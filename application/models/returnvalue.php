<?php

class Returnvalue extends Eloquent {
	public static $table = 'return_values';

	public function item() {
		return $this->belongs_to('DocItem');
	}
}
