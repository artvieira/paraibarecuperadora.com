(function($) {
	
	var loadingDiv = $("#loading-div");
	var errorDiv = $("#error-div");
	var alertDiv = $("#alert-msg");
	var alertOverlay = $("#overlay-div");
	
	var xmOverlay = $('#xm-overlay-div');
	var xmAlert = $('#xm-alert');
	var xmAlertCont = $('#xm-alert-msg');
	
	var xmLoadingSync = $('#xm-loading-sync');
	
	var xmLoadingASync = $('#xm-loading-async');
	
	var xmErrorMsg = $('#xm-error-msg');
	
	var yloadingASync = xmLoadingASync.offset().top;
	var yErrorMsg = xmErrorMsg.offset().top;
	var yoverlay = xmOverlay.offset().top;
	
	$(window).scroll(function () { 
		xmLoadingASync.css('top', yloadingASync+$(document).scrollTop()+'px');
		xmOverlay.css('top', yoverlay+$(document).scrollTop()+'px');
		xmErrorMsg.css('top', yErrorMsg+$(document).scrollTop()+'px');
	});
	
	$('#xm-alert-ok').click(function(){
		xmOverlay.hide();
		xmAlert.hide();
		xmAlertCont.html('');
	});
	
	xmErrorMsg.dblclick(function(){
		xmErrorMsg.hide(250);
		xmErrorMsg.html('');
	});
	
	jQuery.extend({ 
		alert : function(msg) {
			xmAlertCont.append(msg);
			xmAlert.show();
			xmOverlay.show();
		},
		showLoadingSync : function() {
			xmLoadingSync.show();
			xmOverlay.show();
		},
		hideLoadingSync : function() {
			xmLoadingSync.hide();
			xmOverlay.hide();
		},
		showLoadingASync : function() {
			xmLoadingASync.show();
		},
		hideLoadingASync : function() {
			xmLoadingASync.hide();
		},
		displayError : function(msg) {
			xmErrorMsg.hide(250);
			xmErrorMsg.html('');
			
			xmErrorMsg.append(msg);
			xmErrorMsg.slideToggle(500);
		},
		maxChar : function(max, string){
			if (!string) {
				return "";
			}
			
			if (string.length > max) {
				return string.substring(0, max)+"...";
			} else {
				return string;
			}
		},
			
		iterateMap : function (mapObj) {
			for (var key in mapObj) {
				if (hasOwnProperty.call(mapObj, key)) {
					callback(key, mapObj[key]);
				}
			}
		}, 
		
		replaceAll : function (string, replaceTo, replaceFor) {
			if (string != '') {
				var pos = string.indexOf(replaceTo);
			    while (pos > -1){
			    	string = string.replace(replaceTo, replaceFor);
					pos = string.indexOf(replaceTo);
				}
			    return string;
			}
			return '';
		}
	});
})(jQuery);
