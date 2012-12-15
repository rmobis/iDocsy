<?php

class Heading extends Eloquent {
	public function item() {
		return $this->belongs_to('Item');
	}

	public function sub_headings() {
		return $this->has_many('SubHeading', 'heading_id')
					->order_by('order');
	}
}
