<?php

class Item extends Eloquent {
	const TYPE_VARIABLE	= 'Variable';
	const TYPE_FUNCTION	= 'Function';
	const TYPE_CONSTANT	= 'Constant';
	const TYPE_TYPE		= 'Type';

	public function module() {
		return $this->belongs_to('Module');
	}

	public function headings() {
		return $this->has_many('Heading', 'item_id')
					->order_by('order');
	}

	public function full_link() {
		switch ($this->type) {
			case Item::TYPE_VARIABLE:
				$short = 'var';
				break;

			case Item::TYPE_FUNC:
				$short = 'func';
				break;

			case Item::TYPE_CONSTANT:
				$short = 'const';
				break;

			case Item::TYPE_TYPE:
				$short = 'type';
				break;

			default:
				$short = 'home';
				break;
		}

		return URL::to_route($short, array($this->link));
	}
}
