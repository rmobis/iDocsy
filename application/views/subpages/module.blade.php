<?php echo(Breadcrumb::create(array(
    'Documentation' => URL::to_route('home'),
    $module->name
))); ?>

<div class="content">
	<h1 class="code">
		{{ $module->name }}
	</h1>
	<?php
		if (Auth::check()) {
			echo( Button::primary_link(
							URL::to_route('edit_module', array($module->link)),
							'Edit',
							array(
								'style' => 'margin: 0 0 6px 6px;'
							)
						)
						->with_icon('edit'));
		}
	?>

	<div>
		<?php
			echo(render_each('partials.heading', $module->headings, 'heading'));
		?>
	</div>
</div>