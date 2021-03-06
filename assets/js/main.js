function slContent() {
	var iframe = $(".entry-content>iframe").contents();
	var postHeight = iframe.find('.post-iframe').height();
	if (postHeight) {
		$(".entry-content").height(postHeight);
		$(".entry-content>iframe").height(postHeight);
		iframe.height(postHeight);
		iframe.find('html').height(postHeight);
	}
	var backgrounds = iframe.find('[style*="http://mmbiz.qpic.cn"]');
	backgrounds.each(function(){
		var url = $(this).css('background-image').slice(4, -1).replace(/"/g, "");
		if (url) {
			var imgs = $(this).find('img[style*="opacity:0"]');
			var parent = $(this);
			$(parent).css('background-image', 'none');
			imgs.each(function(){
					var src = $(this).attr("src");
					$(parent).css('background-image', 'url("'+src+'")');
			})
		}
	});
}
function footerPosition(){
		$("#colophon").removeClass("fixed-bottom");
		var contentHeight = document.body.scrollHeight;
		var winHeight = window.innerHeight;
		if(!(contentHeight > winHeight)){
				$("#colophon").addClass("fixed-bottom");
		}
}
var x = function () {
	$.material.init();
	slContent();
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
	$('#video-tab').click();
	$(function(){
	    footerPosition();
	    $(window).resize(footerPosition);
			function aside(){
				var contentWidth = document.body.scrollWidth;
				if (contentWidth < 992) {
					$('#secondary').simpleScrollFollow('setEnabled', false);
				} else {
					$('#secondary').simpleScrollFollow('setEnabled', true);
				}
			}
			aside();
	    $(window).resize(aside);
			$(window).scroll(function () {
				var position = $('#secondary').css('position');
				if (position === 'fixed') {
					$('#secondary').addClass('secondaryTop');
				} else {
					$('#secondary').removeClass('secondaryTop');
				}
			});
	});
};
window.onload = x;
