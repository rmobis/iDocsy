<?php echo(Breadcrumb::create(array(
	'Documentation' => URL::to_route('home'),
	'Search'
))); ?>

{{ Form::search_open(URL::to_route('search_query')) }}
	<fieldset>
		<legend><h1>Search</h1></legend>
		<?php
			echo(
				Form::append_buttons(
					Form::text(
						'query',
						$query,
						array(
							'style'			=> 'width: 610px;',
							'autocomplete'	=> 'off'
						)
					),
					Form::submit('Search')
						->with_icon('search')
				)
			);
		?>

	</fieldset>
	{{ Form::close() }}
{{ Form::close() }}

@if (!$valid)
	{{ Alert::error('Ooops! Something went wrong...') }}
@else
	@if (count($results) == 0)
		<p>
			We couldn't find any result for <strong>{{ $query }}</strong>. Try using different terms.
		</p>
	@else
		<script type="text/javascript">
			$('<link>')
				.attr('rel', 'prerender')
				.attr('href', '{{ $results[0]->full_link() }}')
				.appendTo('head');
		</script>

		<p>We found {{ count($results) }} results for <strong>{{ $query }}</strong>:</p>
		<div class="row">
			<div class="span6">
				<?php
					echo(render_each('partials.searchitem', $results, 'item'));
				?>
			</div>
		</div>


		<script type="text/javascript">
			$('.search-item > p').ellipsis();
		</script>
	@endif
@endif



