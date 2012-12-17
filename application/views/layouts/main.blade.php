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
									'label'		=> 'New Item',
									'url'		=> URL::to_route('new_item'),
									'visible'	=> Auth::check(),
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
					<div class="well form-search">
						{{ Form::open(URL::to_route('post_search')) }}
						<?php
							$items = array_map(function($item){
								return $item->name;
							}, Item::all());

							echo(Typeahead::create(
								$items,
								4,
								array(
									'class'				=> 'input-medium search-query',
									'name'				=> 'query',
									'placeholder'		=> 'search iDocsy',
									'autocomplete'		=> 'off',
									'data-left-offset'	=> '10'
								)
							));
						?>
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



		{{ Asset::scripts() }}
		<script type="text/javascript">
			prettyPrint();
		</script>
	</body>
</html>