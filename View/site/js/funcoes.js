jQuery(document).ready(function(){

	//fun��o para rolagem do site
	function movimento(para) {
		$('html,body').animate({
			scrollTop: $("#"+para).offset().top
		}
		, 500);
	}
	
	
});