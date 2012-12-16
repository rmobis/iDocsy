<h2 id="{{$heading->html_id()}}">{{$heading->name}}</h2>
{{$heading->html_content}}

<?php
	echo(render_each('partials.subheading', $heading->sub_headings, 'sub_heading'));
?>