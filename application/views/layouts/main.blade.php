<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">

		<meta name="description" content="iDocs is a cooperative effort to bring decent documentation to Tibia iBot.">
		<meta name="keywords" content="tibia, bot, ibot, tibiaibot, documentation, docs">
		<meta name="robots" content="index,follow">
		<meta name="application-name" content="iDocs">

		<link rel="author" href="https://github.com/rmobis">
		<title>iDocsy - Tibia iBot Documentation</title>

		{{ Asset::styles() }}
		{{ Asset::scripts() }}

		<?php
			$dataSource = json_encode(array_map(function($item){
				return $item->name;
			}, Item::all()));
		?>
		<script type="text/javascript">
			$(prettyPrint);
			$(function() {
				$('.form-search').on('submit', function() {
					var $this = $(this),
						query = $this.find('input[type=text]').val();

					if (query === '') {
						return false;
					} else {
						$(this).prop('action', '{{ URL::to_route('search_query') }}/' + query);
					}
				});

				var query = $('#query');
				query.typeahead({
					"source"		: {{ $dataSource }},
					"items"			: 4,
					"leftOffset"	: 10,
					"updater"		: function(x) {
						query
							.val(x)
							.parent()
								.find('input[name=exactItem]')
									.val(true)
								.end()
								.submit();

						return x;
					}
				});
			});
		</script>
	</head>
	<body>
		<header>
			<?php
				echo( Navbar::create(null, Navbar::FIX_TOP)
							->collapsible()
							->with_brand('iDocsy', URL::to_route('home'))
							->with_menus(array(
								array(
									'label'		=> 'Home',
									'url'		=> URL::to_route('home'),
									'active'	=> Request::route()->is('home'),
									'icon'		=> 'home'
								),
								array(
									'label'		=> 'Login',
									'url'		=> URL::to_route('login'),
									'active'	=> Request::route()->is('login'),
									'visible'	=> Auth::guest()
								),
								array(
									'label'		=> 'New',
									'url'		=> 'javascript:void()',
									'active'	=> Request::route()->is('new_module') || Request::route()->is('new_item'),
									'visible'	=> Auth::check(),
									'items'		=> array(
										array(
											'label' => 'New Module',
											'url'	=> URL::to_route('new_module')
										),
										array(
											'label' => 'New Item',
											'url'	=> URL::to_route('new_item')
										)
									)
								)
							))
							->with_menus(array(
								array(
									'label'		=> 'Logout',
									'url'		=> URL::to_route('logout'),
									'visible'	=> Auth::check()
								)
							), array(
								'class' => 'pull-right'
							))
				);
			?>
		</header>
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="well">
						{{ Form::search_open(URL::to_route('search_query')) }}
						<?php
							echo(Form::text(
								'query',
								null,
								array(
									'id'				=> 'query',
									'class'				=> 'input-medium search-query',
									'placeholder'		=> 'search iDocsy',
									'autocomplete'		=> 'off',
								)
							));
						?>

						{{ Form::hidden('exactJump', 'true') }}
						{{ Form::hidden('exactItem', 'false') }}
						{{ Form::close() }}

						<?php
							echo(render_each('partials.module', Module::with(array('items', 'items.module'))->get(), 'module'));
						?>
					</div>
				</div>
				<div class="span9">
					{{ $subpage }}
				</div>
			</div>
		</div>
	</body>
</html>