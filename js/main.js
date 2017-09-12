window.onload = function() {
	$.material.init();
	var postHeight = $(".entry-content>iframe").contents().find('.post-iframe').height();
	if (postHeight) {
		$(".entry-content").postHeight();
	}
	$('.slider').unslider({
		autoplay: true
	});
	$('#secondary').simpleScrollFollow({
		limit_elem: $('main'),
		setEnabled: true
	});
	$('#myTab a').click(function (e) {
  	e.preventDefault()
  	$(this).tab('show')
	});
	$('#before-tab').click();
	$(function(){
	    function footerPosition(){
	        $("#colophon").removeClass("fixed-bottom");
	        var contentHeight = document.body.scrollHeight;
	        var winHeight = window.innerHeight;
	        if(!(contentHeight > winHeight)){
	            $("#colophon").addClass("fixed-bottom");
	        }
	    }
			function aside(){
				var contentWidth = document.body.scrollWidth;
				if (contentWidth < 992) {
					$('#secondary').simpleScrollFollow('setEnabled', false);
				} else {
					$('#secondary').simpleScrollFollow('setEnabled', true);
				}
			}
	    footerPosition();
			aside();
	    $(window).resize(footerPosition);
	    $(window).resize(aside);
	});
};
