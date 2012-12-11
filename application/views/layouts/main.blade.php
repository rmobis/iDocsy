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
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="/">iDocsy</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li class="divider-vertical"></li>
								<li class="active">
									<a href="/">
										<i class="icon-home icon-white"></i>
										Home
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
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
							echo(render_each('partials.docmodule', DocModule::with(array('sections', 'sections.items'))->get(), 'module'));
						?>
					</div>
				</div>
				<div class="span9">
					<ul class="breadcrumb">
						<li>
							<span>Documentation</span>
							<span class="divider">/</span>
						</li>
						@foreach (array($item->section->module, $item->section, $item) as $crumb)
						<li>
							<span>{{ $crumb->name }}</span>
							<span class="divider">/</span>
						</li>
						@endforeach
					</ul>
					<div class="content">
						<h1 class="code">
							{{ $item->name }}
						</h1>
						<h2>Description</h2>
						<p>Your current capacity left.</p>
						<h2>Usage</h2>
						<pre class="prettyprint linenums lang-lua">if cap < 10 then
	-- Less than 10 capacity left
end</pre>
					</div>
				</div>
			</div>
		</div>



		{{ Asset::scripts() }}
		<script type="text/javascript">
			prettyPrint();
		</script>
	</body>
</html>