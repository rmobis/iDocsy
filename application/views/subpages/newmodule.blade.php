<?php echo(Breadcrumb::create(array(
	'Admin Panel' => '',
	'New Module'
))); ?>

<div class="content">
	<script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	{{ Form::open(URL::to_route('home'), 'POST', array('style' => 'margin-top: 15px;')) }}
		<h1>
			Basic Info
		</h1>
		<div class="row-fluid">
			<div class="span6">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', '', array('class' => 'input-block-level')) }}
			</div>
			<div class="span6">
				{{ Form::label('link', 'Link') }}
				{{ Form::text('link', '', array('class' => 'input-block-level')) }}
				{{ Form::block_help('A link must be unique through all modules.') }}
			</div>
		</div>
		<hr>
				<h1>
					Content
				</h1>
		<ul class="unstyled" id="headings">
			<li id="model">
				<div class="row-fluid">
					<div class="span6">
						{{ Form::text('heading-name-', '', array('class' => 'input-block-level')) }}
					</div>
					<div class="span6">
						{{ Form::checkbox('heading-sub-', '', true, array('style' => 'display: none;'))}}
						{{ ButtonGroup::open(null, array('class' => 'pull-right')) }}
							{{ Button::inverse_normal('Heading', array('class' => 'input-medium head-toggle', 'data-toggle' => 'button')) }}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'dropup moveup'))}}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'movedown'))}}
							{{ Button::danger_normal('Delete')}}
						{{ ButtonGroup::close() }}
					</div>
				</div>


				<div class="ace_wrapper">
					<div class="editor" id="editor-"></div>
				</div>
			</li>
			<li id="desc">
				<div class="row-fluid">
					<div class="span6">
						{{ Form::text('heading-name-1', 'Description', array('class' => 'input-block-level', 'disabled' => 'disabled')) }}
					</div>
					<div class="span6">
						{{ Form::checkbox('heading-sub-1', '', true, array('style' => 'display: none;'))}}
						{{ ButtonGroup::open(null, array('class' => 'pull-right')) }}
							{{ Button::inverse_normal('Heading', array('class' => 'input-medium head-toggle', 'data-toggle' => 'button', 'disabled' => 'disabled')) }}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'dropup', 'disabled' => 'disabled'))}}
							{{ Button::primary_normal('<span class="caret"></span>', array('disabled' => 'disabled'))}}
							{{ Button::danger_normal('Delete', array('disabled' => 'disabled'))}}
						{{ ButtonGroup::close() }}
					</div>
				</div>

				<div class="ace_wrapper">
					<div class="editor" id="editor-1"></div>
				</div>
			</li>
			<li>
				<div class="row-fluid">
					<div class="span6">
						{{ Form::text('heading-name-', '', array('class' => 'input-block-level')) }}
					</div>
					<div class="span6">
						{{ Form::checkbox('heading-sub-', '', true, array('style' => 'display: none;'))}}
						{{ ButtonGroup::open(null, array('class' => 'pull-right')) }}
							{{ Button::inverse_normal('Heading', array('class' => 'input-medium head-toggle', 'data-toggle' => 'button')) }}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'dropup moveup'))}}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'movedown'))}}
							{{ Button::danger_normal('Delete')}}
						{{ ButtonGroup::close() }}
					</div>
				</div>

				<div class="ace_wrapper">
					<div class="editor" id="editor-2"></div>
				</div>
			</li>
			<li>
				<div class="row-fluid">
					<div class="span6">
						{{ Form::text('heading-name-', '', array('class' => 'input-block-level')) }}
					</div>
					<div class="span6">
						{{ Form::checkbox('heading-sub-', '', true, array('style' => 'display: none;'))}}
						{{ ButtonGroup::open(null, array('class' => 'pull-right')) }}
							{{ Button::inverse_normal('Heading', array('class' => 'input-medium head-toggle', 'data-toggle' => 'button')) }}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'dropup moveup'))}}
							{{ Button::primary_normal('<span class="caret"></span>', array('class' => 'movedown'))}}
							{{ Button::danger_normal('Delete')}}
						{{ ButtonGroup::close() }}
					</div>
				</div>

				<div class="ace_wrapper">
					<div class="editor" id="editor-3"></div>
				</div>
			</li>
		</ul>
		<script type="text/javascript">
			window.editors = [];
			function loadEditor(el) {
				var editor = new ace.edit(el),
					edSess = editor.getSession();

				edSess.setMode('ace/mode/html');
				edSess.setUseSoftTabs(false);
				editor.setShowPrintMargin(false);

				editors.push(editor);
				console.log(editor);
			}

			function move(el, swpMd) {
				var $this = $(el),
					curLi = $this.closest('li'),
					swpLi = curLi[swpMd](),
					bthLi = $.merge($.merge($(), curLi), swpLi),
					curDef = new $.Deferred(),
					swpDef = new $.Deferred(),
					finDef = $.when(curDef, swpDef),
					swpMds = {
						prev: {
							mul: -1,
							ins: 'before'
						},
						next: {
							mul: 1,
							ins: 'after'
						}
					};

				bthLi.css('position', 'relative');
				curLi.animate({
					top: swpLi.outerHeight(true) * swpMds[swpMd].mul
				}, 5000, curDef.resolve);
				swpLi.animate({
					top: curLi.outerHeight(true) * -swpMds[swpMd].mul
				}, 5000, swpDef.resolve);

				finDef.done(function(){
					bthLi.css('position', 'static')
						 .css('top', 0);

					swpLi[swpMds[swpMd].ins](curLi);

					bthLi.each(function(){
						var $this = $(this);
						$this.find('.moveup').prop('disabled', $this.prev().attr('id') == 'desc');
						$this.find('.movedown').prop('disabled', !$this.next().length);
					});

					curLi.find('input[type=text]').focus();
				});
			}

			var a = $('.editor');
			loadEditor($('.editor')[1]);
			loadEditor(a[2]);
			loadEditor(a[3]);

			$('#headings').on('click', '.moveup', function(){
				move(this, 'prev');
			}).on('click', '.movedown', function(){
				move(this, 'next');
			}).on('click', '.head-toggle', function(){
				var $this = $(this);
				if ($this.hasClass('active')) {
					$this.text('Heading')
						.parent().siblings('input[type=checkbox]').prop('checked', true)
							.closest('li').removeClass('subheading');
				} else {
					$this.text('Sub-Heading')
						.parent().siblings('input[type=checkbox]').prop('checked', false)
							.closest('li').addClass('subheading');
				}
			})
		</script>
	{{ Form::close() }}
</div>