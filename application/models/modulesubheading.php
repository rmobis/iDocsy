<?php

class ModuleSubHeading extends Eloquent {
	public static $table = 'module_sub_headings';

	public function heading() {
		return $this->belongs_to('ModuleHeading');
	}

	public function html_id() {
		return Str::slug($this->name);
	}
}
