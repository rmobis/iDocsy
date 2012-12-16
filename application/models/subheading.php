<?php

class SubHeading extends Eloquent {
	public static $table = 'sub_headings';

	public function heading() {
		return $this->belongs_to('Heading');
	}

	public function html_id() {
		return Str::slug($this->name);
	}
}
