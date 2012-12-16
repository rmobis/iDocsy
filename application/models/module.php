<?php

class Module extends Eloquent {
	private $vars;
	private $funcs;
	private $consts;
	private $typs;

	public function headings() {
		return $this->has_many('ModuleHeading', 'module_id')
					->order_by('order');
	}

	public function items() {
		return $this->has_many('Item', 'module_id')
					->order_by('type')
					->order_by('name');
	}

	public function full_link() {
		return URL::to_route('module', array($this->link));
	}

	public function variables() {
		if (!isset($vars)) {
			$vars = array_filter($this->items, function($v) {
				return $v->type === Item::TYPE_VARIABLE;
			});
		}

		return $vars;
	}

	public function functions() {
		if (!isset($funcs)) {
			$funcs = array_filter($this->items, function($v) {
				return $v->type === Item::TYPE_FUNCTION;
			});
		}

		return $funcs;
	}

	public function constants() {
		if (!isset($consts)) {
			$consts = array_filter($this->items, function($v) {
				return $v->type === Item::TYPE_CONSTANT;
			});
		}

		return $consts;
	}

	public function types() {
		if (!isset($typs)) {
			$typs = array_filter($this->items, function($v) {
				return $v->type === Item::TYPE_TYPE;
			});
		}

		return $typs;
	}
}
