(function() {
	$(function(){		
		//http://www.tuttoaster.com/enhancing-forms-using-jquery-ui/4/
		//http://imasters.com.br/artigo/21928/javascript/30-dicas-para-melhorar-o-desempenho-do-javascript
		//http://www.quickonlinetips.com/archives/2010/05/leverage-browser-caching-increase-website-speed/
		//document.domain = "localhost";
		
		$.uhbChangesUrl(function(){
			var pagina = $.uhbGetParam('page');
		
			if (pagina == 'home'){
				loadLink('content/lhome.html');
				
				$('title').html('Home - Paraiba Recuperadora - Recuperação de cabines e caminhões de todas as marcas');
				
				console.log($.uhbGetParam('post'));
				
			} else if (pagina == 'sobre') {
				loadLink('content/labout.html');
				
				$('title').html('Sobre Nós - Paraiba Recuperadora - Recuperação de cabines e caminhões de todas as marcas');

			} else if (pagina == 'contato') {
				loadLink('content/lcont.html');
				
				$('title').html('Contato - Paraiba Recuperadora - Recuperação de cabines e caminhões de todas as marcas');
				
			} else if (pagina == 'servicos') {
				loadLink('content/lserv.html');
				
				$('title').html('Serviços - Paraiba Recuperadora - Recuperação de cabines e caminhões de todas as marcas');

			} else if (pagina == 'trabalhos') {
				loadLink('content/ltrab.html');
				
				$('title').html('Trabalhos - Paraiba Recuperadora - Recuperação de cabines e caminhões de todas as marcas');
				
			} else if (pagina == 'nothashbang') {
				window.location = window.location.toString() + '#!/page/home/'
			} else if (pagina == 'notfound'){
				$.alert('404');
			}
		});
		
		var loadLink = function (url) {
			content.css('height','800px');
			contentWrapper.hide();
			contentWrapper.load(url, function(){
				contentWrapper.fadeIn(250);
				content.css('height','');
				return false;
			});
		}
		
		var content = $('#content');
	 	var contentWrapper = $('#content-wrapper');
		
		if (!Modernizr.csstransitions) {
//			TODO css3 transition
			console.log('fazer transição do menu');
		}
	});
})();