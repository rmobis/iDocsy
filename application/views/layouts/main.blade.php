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
				/*echo Navbar::create('iDocsy', URL::to_route('home'),
					array(
						array(
							'attributes' => array(),
							'items' => array(
								array(
									'label'		=> 'Home',
									'url'		=> URL::to_route('home'),
									'active'	=> Request::route()->is('home')
								),
								array(
									'label'		=> 'Login',
									'url'		=> URL::to_route('login'),
									'active'	=> Request::route()->is('login')
								)
							)
						)
					)
				);*/
			?>
			<!--<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="{{ URL::to_route('home') }}">iDocsy</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li class="divider-vertical"></li>
								<li
								@if (Request::route()->is('home'))
								class="active"
								@endif
								>
									<a href="{{ URL::to_route('home') }}">
										<i class="icon-home icon-white"></i>
										Home
									</a>
								</li>
								@if (Auth::guest())
									<li
										@if (Request::route()->is('login'))
											class="active"
										@endif
									>
										<a href="{{ URL::to_route('login') }}">
											Login
										</a>
									</li>
								@else
									<li></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>-->
		</header>
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="well form-search">
						<div class="dropdown search">
							<input type="text" class="input-medium search-query" name="search" value="" placeholder="search iDocsy" autocomplete="off">
						</div>
						<div class="spacer"></div>

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