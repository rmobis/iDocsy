<div class="search-item">
	<h3>
		<a href="{{ $item->full_link() }}">
			@if ($item instanceof Item)
				<strong>{{ $item->module->name }}</strong> - <strong>{{ $item->name }}</strong>
			@else
				<strong>{{ $item->name }}</strong>
			@endif
		</a>
	</h3>
	<p>
		@if (count($item->headings) > 0)
			{{ strip_tags($item->headings[0]->html_content) }}
		@else
			No description.
		@endif
	</p>
</div>