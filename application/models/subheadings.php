<?php

class SubHeading extends Eloquent {
	public static $table = 'sub_headings';

	public functon heading() {
		return $this->belongs_to('Heading');
	}
}
