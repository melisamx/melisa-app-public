StartTest(function(t) {
    
    t.diag('Testing input form register');
    
    t.chain(
        { click: '#name' },
        { action: 'type', text: 'some task[TAB]' },
        /* failed use type */
        function(next) {
            $('#email').val('test');
            next();
        },
        { click: '#password' },
        { action: 'type', text: '123[TAB]123' },
        { click: 'button:contains(Register)' }
    );
    
});
