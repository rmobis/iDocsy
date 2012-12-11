<ul class="nav nav-list well docs">
	<li class="nav-header module">
		<span>{{ $module->name }}</span>
	</li>

	<?php echo render_each('partials.docsection', $module->sections, 'section'); ?>
</ul>