(function($){
	$.entwine('ss', function($){
		$('.admin-help-list a').entwine({
			onclick:function(e) {
				e.preventDefault();

				if(!$('.cms-container').loadPanel(this.attr('href'))) return false;
			}
		});
	});
})(jQuery);