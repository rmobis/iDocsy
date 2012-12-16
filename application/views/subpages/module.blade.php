<?php echo(Breadcrumb::create(array(
    'Documentation' => URL::to_route('home'),
    $module->name
))); ?>

<div class="content">
	<h1 class="code">
		{{ $module->name }}
	</h1>

	<?php
		echo(render_each('partials.heading', $module->headings, 'heading'));
	?>
</div>