/**
* jFriendly : jQuery Plugin to make friendly urls in your forms.
* by : ikhuerta (ikhuerta@gmail.com)
* more info : 
**/
(function($){
    $.fn.extend({
        jFriendly : function ( inputUri , notEditable ){
        	inputUri = $(inputUri);
			$(this).blur(function(){
				//alert (uriSanitize($(this).val()));
				inputUri.val( uriSanitize($(this).val()) );
			});
			
			return inputUri;
        }
    });
})(jQuery);  
uriSanitize  = function(s){
    var r = s.toLowerCase();
    non_asciis = {'a': '[àáâãäå]', 'ae': 'æ', 'c': 'ç', 'e': '[èéêë]', 'i': '[ìíîï]', 'n': 'ñ', 'o': '[òóôõö]', 'oe': 'œ', 'u': '[ùúûűü]', 'y': '[ýÿ]', '-': '[ ]'};
    for (i in non_asciis) { r = r.replace(new RegExp(non_asciis[i], 'g'), i); }
    	//alert(r);
    return r;
};