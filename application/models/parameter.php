<?php

class Parameter extends Eloquent {
	public static $table = 'parameters';

	public function item() {
		return $this->belongs_to('DocItem');
	}
}
