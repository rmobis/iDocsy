<ul class="nav nav-list well docs">
	<li class="nav-header module">
		<a href="{{ $module->full_link() }}">{{ $module->name }}</a>
	</li>

	<?php
		echo(render_each(
			'partials.section',
			array_map(function($v) use ($module) {
				$method = $v . 's';
				return $module->$method();
			}, Item::$types),
			'items'
		));
	?>
</ul>