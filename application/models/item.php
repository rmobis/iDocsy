<?php

class Item extends Eloquent {
	public static $VARIABLE	= 'Variable';
	public static $FUNCTION	= 'Function';
	public static $CONSTANT	= 'Constant';
	public static $TYPE		= 'Type';

	public function module() {
		return $this->belongs_to('Module');
	}

	public function headings() {
		return $this->has_many('Heading', 'item_id')
					->order_by('order');
	}
}
