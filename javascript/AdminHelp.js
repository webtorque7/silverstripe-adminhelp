(function($){
	$.entwine('ss', function($){
		$('.admin-help-list a').entwine({
			onclick:function(e) {
				e.preventDefault();

				if(!$('.cms-container').loadPanel(this.attr('href'))) return false;
			}
		});

		$('.admin-help-field-toggle').entwine({
			onclick:function(e) {
				e.preventDefault();
				this.parent().find('.admin-help-field-content').slideToggle(0);
			}
		});
	});
})(jQuery);