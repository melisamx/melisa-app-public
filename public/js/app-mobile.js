(function($) {
    
    String.prototype.format = function() {
        var formatted = this;
        for (var i = 0; i < arguments.length; i++) {
            var regexp = new RegExp('\\{'+i+'\\}', 'gi');
            formatted = formatted.replace(regexp, arguments[i]);
        }
        return formatted;
    };
        
    function installIds() {
        
        if(typeof Native === 'undefined') {
        
            return;

        }
        
        var $form = $('form'),
            tpl = '<input type="hidden" value="{0}" name="{1}" id="{1}">',
            ids;
        
        try {
            ids = JSON.parse(Native.getIds());
        } catch (e) {
            
        }
        
        if(typeof ids.idDevice === 'undefined') {
            
            return;
            
        }
        
        $form.append([
            tpl.format(ids.idDevice || '', 'idDevice'),
            tpl.format(ids.idGoogleRegistration || '', 'idGoogleRegistration'),
            tpl.format(ids.idOneSignalUser || '', 'idOneSignalUser')
        ]);
        
    };
    
    installIds();
    
})(jQuery);
