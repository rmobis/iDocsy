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
		if (Auth::check()) {
			echo( Button::primary_link(
							URL::to_route('edit_item', array($item->id)),
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
			echo(render_each('partials.heading', $item->headings, 'heading'));
		?>
	</div>
</div>