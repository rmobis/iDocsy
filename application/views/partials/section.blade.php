@if (count($items) > 0)
<li class="nav-header section">
	<span>{{ reset($items)->type }}s</span>
</li>

<?php echo render_each('partials.item', $items, 'item'); ?>

<li class="spacer"></li>
@endif