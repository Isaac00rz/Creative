$(document).ready(main);
 
var contador=0;

function main(){
	$('.menu_bar').click(function(){

		if(contador == 1){
			$('nav').animate({
				left: '-100%'
			});
			contador = 0;
			
		} else {
			contador = 1;
			$('nav').show(500);
			$('nav').animate({
				left: '0'
			});

		}
		  $(".menu_bar span").toggle();
	});
	
	$('.submenu').click(function(){
		$(this).children('.item').slideToggle();
	});

};

