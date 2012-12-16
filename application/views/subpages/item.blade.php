<?php echo(Breadcrumb::create(array(
	'Documentation' => URL::to_route('home'),
	$item->module->name => $item->module->full_link(),
	$item->name
))); ?>

<div class="content">
	<h1 class="code">
		{{ $item->name }}
	</h1>

	<?php
		echo(render_each('partials.heading', $item->headings, 'heading'));
	?>
</div>