<?php

class Module extends Eloquent {
	public function items() {
		return $this->has_many('Item', 'module_id')
					->order_by('type')
					->order_by('name');
	}
}
