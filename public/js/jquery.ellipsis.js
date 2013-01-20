/**
 *
 */
(function($) {
	$.fn.ellipsis = function(rows) {
		var splitChars = /[\s\.,]/;

		this.each(function() {
			var $this	= $(this),
				text	= $this.text(),
				cssH	= $this.css('height'),
				cssMinH	= $this.css('min-height'),
				height	= $this.height();

			$this.text(text)
				.css('height', 'inherit')
				.css('min-height', 'inherit');

			while ($this.height() > height && text.match(/[\s\.,]/)) {
				text = text.replace(/[\s\.,]+[^\s\.,]*$/, '');
				$this.text(text + '…');
			}

			$this.css('height', cssH)
				.css('min-height', cssMinH);
		});

		return this;
	};

})(jQuery);