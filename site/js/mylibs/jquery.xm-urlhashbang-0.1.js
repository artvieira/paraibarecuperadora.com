(function($) {
	var hashBangRegex = /\/\#\!\//;
	
	var getUrl = function() {
		return window.location.toString();
	};
	
	var getUrlHash = function() {
		var temp = getUrl();
		
		if (temp.match(hashBangRegex)) {
			return temp.split(hashBangRegex)[1]
		}
		
		return '';
	};
	
	jQuery.extend({
		uhbGetParam : function(param) {
			var keyValues = getUrlHash().split(/\//);
			
			if (keyValues.length == 1) {
				if (keyValues[0] == ''){
					return 'nothashbang';
				}
				
				return 'notfound';
			}
			
			keyValues.pop(keyValues.length-1);
			var i = keyValues.length;
			
			while (i > 0) {
				if (keyValues[i-2] == param) {
					return keyValues[i-1];
				}
				
			    i-=2;
			}
			
			return 'notfound';
		},
		uhbGetMapParams : function() {		
			var keyValues = getUrlHash().split(/\//);
			
			if (keyValues.length == 1) {
				if (keyValues[0] == ''){
					return 'nothashbang';
				}
				
				return 'notfound';
			}
			
			keyValues.pop(keyValues.length-1);
			var i = keyValues.length;
			
			var params = {};
			
			while (i > 0) {
				params[keyValues[i-2]] = keyValues[i-1];
			    i-=2;
			}
			
			return params;
		}, 
		uhbChangesUrl : function(callback) {
			$(window).bind('hashchange', function() {
				callback();
			});
			
			$(window).load(function(){
				callback();
			});
		}
	});
})(jQuery);