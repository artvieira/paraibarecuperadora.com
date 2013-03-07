(function() {
	/*status de tela
	 * http://stackoverflow.com/questions/5980389/proper-way-to-use-ajax-post-in-jquery-to-pass-model-from-strongly-typed-mvc3-vie
	 * http://www.tvidesign.co.uk/blog/improve-your-jquery-25-excellent-tips.aspx
	 * http://br.html5boilerplate.com/ 
	 * */
	var INIT = 0;
	var SAVE = 1;
	var EDIT = 2;
	var VISU = 3;
	
	//inicio variaveis importante 1
	var post = '../resources/UtilBO.php';	
	var domain = 'ponto';
	
	var loadingDiv = $("#loading-div");
	var errorDiv = $("#error-div");
	
	var dataTable = $(".data-grid");
	var listaPrincipal = null;
	
	var formPrincipal = $("#mainForm");
	//fim variaveis importantes 1
	
	var tituloVar;
	var conteudoVar;
	var dateD;
	
	var dataTableAddRow = function(row) {
		return "<tr id=\""+row.id+"\">" +
					"<td class=\"cell-tbody\">"+row.id+"</td>" +
					"<td class=\"cell-tbody\">"+$.maxChar(60, row.data)+"</td>" +
					"<td class=\"cell-tbody\">"+$.maxChar(60, row.horario)+"</td>" +
					"<td class=\"cell-tbody\">"+$.maxChar(60, row.sentido)+"</td>" +
					"<td class=\"cell-tbody delete-class\">X</div></td>" +
					"<td style=\"display: none;\">"+JSON.stringify(row)+"</td>" +
				"</tr>";
	}
	
	function addRows(array) {
		var html = "<tbody>";
		
		for (var i = 0; i < array.length; i++) {
			html += dataTableAddRow(array[i]);
		}
		
		html += "</tbody>";
		
		removeRows();			
		
		$(".data-grid").hide();
		$(".data-grid").append(html);
		$(".data-grid").fadeIn(250);
		
//		tbody scrollble
//		$(".data-grid > tbody").css('height', '300px').css('overflow', 'auto').css('display', 'block');
	}
	
	function addRow(row) {
		var html = dataTableAddRow(row);
		$(".data-grid > tbody").hide();
		$(".data-grid > tbody").append(html);
		$(".data-grid > tbody").fadeIn(250);
	}
	
	function removeRows() {
		$(".data-grid > tbody").fadeOut(250);
		$(".data-grid > tbody").remove();
	}
	
	function replaceRow(row) {
		var html = dataTableAddRow(row);
		$("tr#"+row.id).hide();
		$("tr#"+row.id).replaceWith(html);
		$("tr#"+row.id).fadeIn(250);
	}
	
	$("table.data-grid > tbody > tr").live("click", function(){
		var str = $(this).children(":last-child").html();
		
		var json = eval('(' + str + ')');
		
		$("#id").attr("value", json.id);
		$("#horario").attr("value", json.horario);
		$("#data").attr("value", json.data);
		$.refreshValueRadio('sentido', json.sentido);
		formPrincipal.enableForm();
	});	

	$('#save').click(function() {
		formPrincipal.enableForm();
	    var json = formPrincipal.serializeFormToJson();
	    
	    if (!json.id) {
	    	$.xmAjaxSync(json, domain, 'save', post, function(ret) {	    		
	        	addRow(ret);
	        	$.alert("Registro salvo com sucesso! =)");
	        });
	    } else {
	    	$.xmAjaxSync(json, domain, 'edit', post, function(ret) {	    		
	    		replaceRow(ret);
	    		$.alert("Registro atualizado com sucesso! =)");
	        });
	    }
	    
	    formPrincipal.disableForm();
	});
	
	$("#search").click(function() {
		var json = formPrincipal.serializeFormToJson();
		
		$.xmAjaxSync(json, domain, 'search', post, function(ret){
			if (ret.length < 1) {
				removeRows();
				$.alert("Nenhum resultado para a pesquisa!");
			} else {			
				addRows(ret);
			}
		});
	});
	
	$("#new").click(function() {
		formPrincipal.clearForm();
	});
	
	$("table.data-grid > tbody > tr > .delete-class").live("click", function(){
		var row = $(this).parent("tr");
		
		var id = row.attr("id");
	
		$.xmAjaxASync({id: row.attr("id")}, domain, 'delete', post, function(ret){
			$.alert("Removido com sucesso!");
			$(row).remove();
		});
	});
})();