jQuery(function($){
	// Dropdown Menu 
	$(".menu-item.menu-item-has-children.dropdown").hover(
		function() {
			$(this).addClass("show").find(".dropdown-menu").addClass("show");
		},
		function() {
			$(this).removeClass("show").find(".dropdown-menu").removeClass("show");
		}
	);
});