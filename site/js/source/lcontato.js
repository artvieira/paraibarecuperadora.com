(function() {
	var post = '../resources/Mailer/Mailer.php';	
	var formPrincipal = $('#formmail');
	
	var namemsg = $('#namemsg');
	var emailmsg = $('#namemsg');
	var headmsg = $('#namemsg');
	var bodymsg = $('#namemsg');
	
	$('.required').focus(function(){
		$(this).removeClass('validation-class');
	});
	
	function validarCampos() {
		var invalido = false;
		
		formPrincipal.iterateFormTextOnly(function(field){
			var value = field.value;
			
			if (value == '' || value == null || value == undefined) {
				$(field).addClass('validation-class');
				invalido = true;
			}
		});
		
		if (invalido) {
			$.alert('Favor preenchert todos campos em vermelho!');
			return false;
		}
		
		return true;
	}
	
	$('#new').click(function() {
		formPrincipal.clearForm();
	});
	
	$('#send').click(function(){
		if (validarCampos()) {
		
			var jsonSend = formPrincipal.serializeFormToJson();
			
			var showLoader = setTimeout("$.showLoadingASync()", 750);
			$.post(post,{json: jsonSend, method: 'sendMail'}, function(response) {
				clearTimeout(showLoader);
				$.hideLoadingASync();
				
		    	if (response == '1') {
		    		$.alert('Email enviado com sucesso! Logo entraremos em contato');
		    	} else {
		    		$.alert('Desculpe pelo inconviente, não foi possivel enviar o email\nErro PHP: ' + response);
		    	}
		    	
		    	formPrincipal.clearForm();
			});
		}
	});
	

})();
