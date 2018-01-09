
jQuery(document).ready(function($) {


	$(".thumbnails a").fancybox({
		'transitionIn'	:'elastic',
		'transitionOut'	:'elastic',
		'speedIn'		:200,
		'speedOut'		:100,
		'overlayShow'	:false
	});

	$('.dropdown-toggle').dropdown();

	$('#topbar').scrollspy();

	$('#information-tabs a:first').tab('show');



});
