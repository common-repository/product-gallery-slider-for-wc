// JavaScript Document
jQuery(document).ready(function($){
	
	if(object_name.pgsfw_arrow_disable == 1){ 
		var slider_arrow = false;
	}else{
		var slider_arrow = true;
	}
	
	var sliderlayout = object_name.pgsfw_gallery_layout;
	
	if(sliderlayout!='horizontal' && sliderlayout!=' ')
		{
			var verticalslider = true;
		}
		else
		{
			var verticalslider = false;
		}
		
	if(sliderlayout=='left')
	{
		jQuery(".slider.pgsfw-slider-for").addClass("pgsfw-left");
	}
	else if(sliderlayout=='right')
	{
		jQuery(".slider.pgsfw-slider-for").addClass("pgsfw-right");
	}
	else
	{
		jQuery(".slider.pgsfw-slider-for").removeClass('pgsfw-left');
		jQuery(".slider.pgsfw-slider-for").removeClass('pgsfw-right');
	}
	
		
	jQuery('.pgsfw-slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: slider_arrow,
		fade: true,
		verticalSwiping: true,
		asNavFor: '.pgsfw-slider-nav'
	});
	
	jQuery('.pgsfw-slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.pgsfw-slider-for',
		dots: false,
		centerMode: true,
		arrows: false,
		vertical:verticalslider,
		focusOnSelect: true
	});
	
	 jQuery('.pgsfw-popup').magnificPopup({
		  type: 'image',
		  gallery:{
			enabled:true
		  }		  
	});
	

});
