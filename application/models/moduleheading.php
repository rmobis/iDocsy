<?php

class ModuleHeading extends Eloquent {
	public static $table = 'module_headings';

	public function item() {
		return $this->belongs_to('Module');
	}

	public function sub_headings() {
		return $this->has_many('ModuleSubHeading', 'heading_id')
					->order_by('order');
	}

	public function html_id() {
		return Str::slug($this->name);
	}
}
