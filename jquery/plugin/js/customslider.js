(function ($) {
  $.fn.jwSlider = function(options){
	  /*default values*/
	  var defaults = {
		  speed: 1000,
		  pause: 2000,
		  transition: 'fade'
	  }
	  /*merge default value & user added values*/
	  options = $.extend(defaults, options);

	  this.each(function(){ 
		  var $this = $(this);
		  
		  /*targeting ul*/
		  $this.wrap('<div class="slider-wrap">');
		  
		  $this.css({
			  'width' : '99999px',
			  'position' : 'relative',
			  'padding' : 0
		  });
		  /*targeting ul*/
		  
		  /*targeting li*/
		  if(options.transition == 'slide'){
			  $this.children().css({
				  'float' : 'left',
				  'list-style' : 'none'
			  });
			  /*set width to the wrapper based on li width*/
			 $(".slider-wrap").css({
				'width' : $this.children().width(),
				'overflow' : 'hidden'
			  });
			  /*set width to the wrapper based on li width*/
		  }
		  
		  if(options.transition == 'fade'){
			  $this.children().css({
				'width' : $this.children().width(),
				'position' : 'absolute',
				'left' : 0
			  });
			  
			  /*to fix the zIndex issue - showing last image first issue*/
			  for(var i = $this.children().length - 1, j = 0; i >= 0; i--, j++){
				  $this.children().eq(j).css('zIndex', i + 99999);
			  }
			  /**/
			  fade();
		  }
		  /*targeting li*/
		  
		  function fade(){
			 setInterval(function(){
				 
			 }, options.pause); 
		  }
	  });
  }
})(jQuery);


/*
1. Self-Invoking Functions:
Function expressions will execute automatically if the expression is followed by ().
(function () {
  alert('aa');
})();

2. jQuery.extend()
Merge/Combines the contents of two or more objects together into the first object.

*/