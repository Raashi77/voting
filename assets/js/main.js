
	
	/*Scroll to top function*/	
	$("#totop").click(function () {
		$("html, body").animate({scrollTop:0}, 1500)
	});
	
	$(window).scroll(function (event) {
		if($(this).scrollTop() > 300){
			$("#totop").fadeIn();
		}
		else{
			$("#totop").fadeOut();
		}
	});
	/*scroll to top end*/


	    $('.videoslick').slick({
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    autoplay: false,
	    autoplaySpeed: 2000,
	    arrows: false,
	    dots: false,
	    pauseOnHover: false,
	});



 	 $(".videocontrollers .fa-chevron-right").click(function(e) {
     $('.videoslick').slick('slickNext');
 	});

 	 $(".videocontrollers .fa-chevron-left").click(function(e) {
     $('.videoslick').slick('slickPrev');
 	});




 	 /*slick for audio*/



 	 	    $('.audioslick').slick({
 	 	    	    slidesToShow: 3,
 	 	    	    slidesToScroll: 1,
 	 	    	    autoplay: false,
 	 	    	    autoplaySpeed: 2000,
 	 	    	    arrows: false,
 	 	    	    dots: false,
 	 	    	    pauseOnHover: false,
 	 	    	    responsive: [{
 	 	    	        breakpoint: 768,
 	 	    	        settings: {
 	 	    	            slidesToShow: 2
 	 	    	        }
 	 	    	    }, {
 	 	    	        breakpoint: 520,
 	 	    	        settings: {
 	 	    	            slidesToShow: 1
 	 	    	        }
 	 	    	    }]
 	 	    	});



 	  	 $(".audiocontroller .fa-chevron-right").click(function(e) {
 	      $('.audioslick').slick('slickNext');
 	  	});

 	  	 $(".audiocontroller .fa-chevron-left").click(function(e) {
 	      $('.audioslick').slick('slickPrev');
 	  	});
