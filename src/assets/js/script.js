$('.show_popup').click(function() {
	$('.overlay_popup, .popup').show();
});
$('.overlay_popup').click(function() {
	$('.overlay_popup, .popup').hide();
});
$(document).ready(function () {
	$('.popup').hide();
});