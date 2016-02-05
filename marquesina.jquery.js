;(function($, window, undefined){
	$.fn.marquesina = function(prv,sig,ini){
		return this.each(function(){
			$container = $(this).children().eq(0);
			if($container){
				var $fotos = $container.children();
				var cantidad = $fotos.length;
				var incremento = $fotos.outerWidth(true);
				var enMarquesina = Math.floor($(this).width() / incremento);
				var primerElemento = 1;
				var estaMoviendo = false;
				if(!ini){
					ini = 1;
					if(ini>cantidad){
						ini = 1;
					}
					if(ini<0){
						ini = 1;
					}
				}
			}

			$container.css('width', (cantidad * enMarquesina) * incremento).css('left', (ini-1) *incremento* -1);
			for(var i=0; i < enMarquesina; i++ ){
				$container.append($fotos.eq(i).clone());
			}
			
			$(sig).click(function(e){
				e.preventDefault();
				elemNext();
			});
			$(prv).click(function(e){
				e.preventDefault();
				elemPrev();
			});
			function elemNext(){
				if(primerElemento > cantidad){
					primerElemento = 2;
					$container.css('left','0px');
				} else {
					primerElemento++;
				}
				
				if(!estaMoviendo){
					estaMoviendo = true;
					$container.animate({
						left: '-=' + incremento,
					}, 'swing', function(){
						estaMoviendo = false;
					});
				}
			}
			function elemPrev(){
				if(primerElemento == 1){
					primerElemento = cantidad;
					$container.css('left', cantidad *incremento* -1);
				} else {
					primerElemento--;
				}
				
				if(!estaMoviendo){
					estaMoviendo = true;
					$container.animate({
						left: '+=' + incremento,
					}, 'swing', function(){
						estaMoviendo = false;
					});
				}
			}
			//temporizador = setInterval("elemNext()",1000);
		});
	}
})(jQuery, window)