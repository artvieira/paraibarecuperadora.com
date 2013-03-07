(function() {	
//	vars de banco
	var post = '../resources/FacadeBO.php';	
	var domain = 'noticia';
	
//	elementos
	var posts = $('#small-posts');
	var paginationDiv = $('#pagination');
	var bigPostWrapper = $('#big-post-wrapper');

//	paginação e aux
	var localJson = '';
	var itensPage = 4;
	var actualPage = 0;
	
//	triggers
	var triggerPost = $('.post-trigger');
	var triggerPagination = $('.trigger-pagination');
	var triggerVoltar = $('.trigger-voltar');
	
	triggerPost.live('click', function(){
		paginationDiv.hide();		
		bigPostWrapper.hide();
		
		var thiz = $(this);
		var index = $(thiz.parent()).attr('id');
		index = Number(index);
		
		var pos = index+(actualPage*itensPage);
		var json = localJson[pos];
		
		posts.hide();
		posts.html('');
		
		var html = '<div id="post-header"><div id="post-title">'+json.titulo+' <div class="trigger-voltar">VOLTAR</div></div></div>'
		
		posts.hide();
		posts.append(html);
		posts.fadeIn(250);
	});
	
	posts.xmAjaxASync(null, domain, 'search', post, function(retorno){
		localJson = retorno;
		buildPostGrid();
	});
	
//	constroi a grid inicial
	function buildPostGrid() {
		var html = '';
		
		for (var i = 0, length = localJson.length; i < itensPage; i++) {
			var thiz = localJson[i];
			
			html += buildPost(thiz, i);
		}
		
		posts.hide();
		posts.append(html);
		posts.fadeIn(250);
		
		paginationDiv.append(buildPostPagination());
	}
	
//	constroi a grid de acordo com a usando parametros da paginação
	function buildPostGridPaginate(page) {
		var html = '';
		posts.hide();
		posts.html('');
		
		if (page) {
			actualPage = page;
		}
		
		for (var i = 0, length = localJson.length; i < itensPage; i++) {
			var thiz = localJson[i+((actualPage)*itensPage)];
			
			if (!thiz) {
				break;
			}
			
			html += buildPost(thiz, i);
		}
		
		posts.hide();
		posts.append(html);
		posts.fadeIn(250);
	}
	
	triggerVoltar.live('click', function(){
		paginationDiv.show();
		bigPostWrapper.show();
		buildPostGridPaginate();
	});
	
//	gatinho disparado ao click na paginação
	triggerPagination.live('click', function(){
		buildPostGridPaginate(this.id);
	});

//	cria html de cada post
	var buildPost = function(json, index){
		var html = '<div class="small-post"><div id="'+index+'" class="small-post-text"><a class="post-trigger">'+$.maxChar(40, json.titulo)+'</a></div><div class="small-post-img">';
		
		if (json.foto) {
			html += '<img border="0" src="images/posts/'+json.foto+'">';
		} else {
			html += '<img border="0" src="images/posts/no-img.png">';
		}
		
		html +=	'</div></div>';
		
		return html;
	}
	
//	constroi a paginação
	var buildPostPagination = function (){
		var pages = localJson.length / itensPage;
		pages = Math.ceil(pages);
		
		var html = '';
		var i = 0;
		
		while (i < pages) {
			html += '<a id="'+i+'" class="trigger-pagination" style="font-size:2em;">'+(i+1)+'</a>  '
			i++;
		}
		
		html += '</div>';
		
		return html;
	}
	
	$('.post-link').live('click', function(){
		console.log(this.id);
		xmGlobal.xmOverlay.show();
	});
	
	xmGlobal.xmOverlay.click(function(){
		xmGlobal.xmOverlay.hide();
	});
})();
