var melisa = melisa || {};

String.prototype.supplant = function (o) {
    return this.replace(/{{([^{}]*)}}/g, function (a, b) {
        var r = o[b];
        return typeof r === 'string' ? r : a;
    });
};

(function($, $$) {
    
    $$.avatars = {
        users: [],
        lastUser: null,
        urlAvatar: null,
        itemTplUser: [
            '<li class="collection-item avatar" data-item="{{idUser}}">',
                '<img src="{{urlAvatar}}" alt="" class="circle">',
                '<span class="title">{{email}}</span>',
                '<p>{{name}}</p>',
            '</li>'
        ].join(''),
        
        init: function() {
            
            var me = this,
                users = me.getUsersLogin(),
                urlAvatar = me.getUrlAvatar();

            if( !users || !urlAvatar) {
                return;
            }
            
            me.users = me.getUsersLogin();
            me.lastUser = me.getLastUserLogin();
            me.urlAvatar = urlAvatar;
            
            if( !me.lastUser) {
                return;
            }
            
            me.setUserLogin(me.lastUser);            
            me.showAvatar();
            me.generateListUsers();
            $('#change-signin')
                .show()
                .bind('click', me.onClickChangeSignin);
            $('#password').focus();
            $('#other-account').bind('click', me.onClicBtnOtherAccount);
            
        },
        
        generateListUsers: function() {
            
            var me = this,
                $lisUsers = $('#list-users-login'),
                itemTpl = me.itemTplUser,
                users = me.users,
                listUsers = '';
            
            users.forEach(function(userLogin) {
                
                listUsers += itemTpl.supplant({
                    idUser: userLogin.idUser,
                    name: userLogin.name,
                    urlAvatar: [
                        me.urlAvatar,
                        userLogin.idFileAvatar,
                        '/?nc=',
                        userLogin.lastUpdated
                    ].join(''),
                    email: userLogin.email
                });
                
            });
            
            $lisUsers.html(listUsers);
            $lisUsers.children('li')
                .bind('click', $.proxy(me.onClickUserLogin, me))
                .bind('mouseenter mouseleave', function() {
                    $(this).toggleClass('active');
                });
            
        },
        
        onClickUserLogin: function(e) {
            
            var me = this,
                user = me.getUser($(e.currentTarget).attr('data-item'));
            
            me.setUserLogin(user);
            $('#users-login').fadeOut();
            
        },
        
        getUser: function(idUser) {
            
            var me = this,
                users = me.users;
            
            return $.grep(users, function(user) {
                return user.idUser === idUser;
            })[0];
            
        },
        
        onClickChangeSignin: function() {
            
            $('#remember-avatar').show();
            $('#users-login').fadeIn();
            
        },
        
        onClicBtnOtherAccount: function() {
            
            $('#users-login').fadeOut(400, function() {
                $('#remember-avatar').fadeOut(400, function() {
                    $('.email').fadeIn(400, function() {
                        $('#email').focus();
                    });
                });
            });
            
        },
        
        getUsersLogin: function() {
            return $.parseJSON(localStorage.getItem('login-usersAvatars'));
        },
        
        getUrlAvatar: function() {
            return localStorage.getItem('login-urlAvatar');
        },
        
        setUserLogin: function(user) {
            
            var me = this;
            
            $('#avatar-photo').attr('src', [
                me.urlAvatar,
                user.idFileAvatar,
                '/?nc=',
                user.lastUpdated
            ].join(''));
            $('#email').val(user.email);
            $('#user-email').html(user.email);
            $('.email').hide();
            $('.remember').hide();
            
        },
        
        getLastUserLogin: function() {
            
            var me = this,
                lastUser = $.grep(me.users, function(user) {
                return user.lastUser === true;
            });
            
            if( !lastUser.length) {
                console.log('no user last login');
                return;
            }
            
            return lastUser[0];
            
        },
        
        showAvatar: function() {
            $('#remember-avatar').show();
        }
        
    };
    
    $$.avatars.init();
    
})(jQuery, melisa);
