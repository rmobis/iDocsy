<?php

class Item extends Eloquent {
	const TYPE_VARIABLE	= 'Variable';
	const TYPE_FUNCTION	= 'Function';
	const TYPE_CONSTANT	= 'Constant';
	const TYPE_TYPE		= 'Type';

	public static $types = array(Item::TYPE_VARIABLE, Item::TYPE_FUNCTION, Item::TYPE_CONSTANT, Item::TYPE_TYPE);

	public function module() {
		return $this->belongs_to('Module');
	}

	public function headings() {
		return $this->has_many('Heading', 'item_id')
					->order_by('order');
	}

	public function full_link() {
		return URL::to_route('item', array($this->module->link, $this->link));
	}
}
