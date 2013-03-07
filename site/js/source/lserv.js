(function() {	
	var post = '../resources/FacadeBO.php';	
	var domain = 'servico';
	var posts = $('#posts');
	
	posts.xmAjaxASync(null, domain, 'search', post, function(ret){
		buildGrid(ret);
	});
	
	function buildGrid(json) {
		var grid = '';
		
		$.each(json, function(){
			grid += '<p class="post-text" >';
			grid += $.maxChar(60, this.empresa);
			grid += '<a id="'+this.id+'" class="post-link">continuar lendo</a>';
			grid += '</p>';
		});
		
		posts.append(grid);
	}

	$('.post-link').live('click', function(){
		console.log(this.id);
	});
})();
