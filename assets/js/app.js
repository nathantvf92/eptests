////////////////////////////////////////////////////////
///////////////back to top ///////////////////////////
////////////////////////////////////////////////////////


jQuery(document).ready(function () {
	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});

	jQuery('.back-to-top').click(function (event) {
		event.preventDefault();
		jQuery('html, body').animate({ scrollTop: 0 }, duration);
		return false;
	})
});

////////////////////////////////////////////////////////
///////////////preloader ///////////////////////////
////////////////////////////////////////////////////////

$(window).load(function () { // makes sure the whole site is loaded
	$('#status').fadeOut(); // will first fade out the loading animation
	$('#preloader .progress').fadeOut(); // will first fade out the loading animation
	$('#preloader .text').fadeOut(); // will first fade out the loading animation
	$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	$('body').delay(350).css({ 'overflow': 'visible' });
});


////////////////////////////////////////////////////////
/////////////// menu and filter ///////////////////////////
////////////////////////////////////////////////////////	

$(document).ready(function () {
	$("#menu-toggle").click(function () {
		$(".main").addClass("full-content");
		$(".sidebar").addClass("close-sidebar");
		$(".navbar-header").addClass("full-content");
		$("#menu-toggle").addClass("hide");
		$("#menu-toggle-close").addClass("show");
	});

	$("#menu-toggle-close").click(function () {
		$(".main").removeClass("full-content");
		$(".sidebar").removeClass("close-sidebar");
		$(".navbar-header").removeClass("full-content");
		$("#menu-toggle").removeClass("hide");
		$("#menu-toggle-close").removeClass("show");
	});

	$("#close-sidebarmenu").click(function () {
		$(".main").removeClass("full-content");
		$(".sidebar").removeClass("close-sidebar");
		$(".navbar-header").removeClass("full-content");
		$("#menu-toggle").removeClass("hide");
		$("#menu-toggle-close").removeClass("show");
	});

	$("#submenu-view").click(function () {
		$(".submenu-div").addClass("open");
	});

	$("#back_main_menu").click(function () {
		$(".submenu-div").removeClass("open");
	});

	$("#submenu-view-2").click(function () {
		$(".submenu-div-2").addClass("open");
	});

	$("#back_main_menu_2").click(function () {
		$(".submenu-div-2").removeClass("open");
	});

	$("#submenu-view-3").click(function () {
		$(".submenu-div-3").addClass("open");
	});

	$("#back_main_menu_3").click(function () {
		$(".submenu-div-3").removeClass("open");
	});

	$("#submenu-view-4").click(function () {
		$(".submenu-div-4").addClass("open");
	});

	$("#back_main_menu_4").click(function () {
		$(".submenu-div-4").removeClass("open");
	});

	$("#submenu-view-5").click(function () {
		$(".submenu-div-5").addClass("open");
	});

	$("#back_main_menu_5").click(function () {
		$(".submenu-div-5").removeClass("open");
	});


	$("#open-filters").click(function () {
		$(".filters-list").addClass("open");
	});

	$("#close-filters").click(function () {
		$(".filters-list").removeClass("open");
	});

	$('#designation_list').slimScroll({
		height: '263px'
	});

	$('#filters-slimScroll').slimScroll({
		height: '82vh'
	});
	$('#submenu_slimscroll').slimScroll({
		height: '71vh'
	});
});