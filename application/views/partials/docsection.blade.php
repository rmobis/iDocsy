<li class="nav-header section">
	<span>{{ $section->name }}</span>
</li>

<?php echo render_each('partials.docitem', $section->items, 'item'); ?>

<li class="spacer"></li>