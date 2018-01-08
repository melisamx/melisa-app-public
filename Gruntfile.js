module.exports = function(grunt) {
    
    var config = {
        writingFolders: require('./config/writingFolders'),
        migrate: require('./config/migrate'),
        migrateReset: require('./config/migrateReset'),
        installBasic: require('./config/installBasic')
    };
    
    grunt.initConfig({
        pkg: {
            appsPaths: 'App',
            proyect: {
                name: 'Melisa Guest',
                version: '1.0.0',
                company: 'Melisa MX'
            }
        },
        uglify: {
            options: {
                report: 'min',
                banner: '/*!\n' + 
                    ' * <%= pkg.proyect.name %>\n' +
                    ' * Copyright (c) 2017 <%= pkg.proyect.company %>\n' +
                    ' * <%= grunt.template.today("yyyy-mm-dd hh:mm:ss") %>\n' +
                    ' */\n'
            },
            production: {
                files: [
                    {
                        cwd : '<%= pkg.appsPaths %>',
                        dest: '<%= pkg.appsPaths %>',
                        expand: true,
                        src: [
                            '!Sencha/*.js',
                            '**/*.js',
                            '!**/*.min.js'
                        ]
                    }
                ]
            }
        },
        clean: {
            logfiles: [
                '<%= pkg.appsPaths %>/**/storage/logs/*.log',
                '<%= pkg.appsPaths %>/**/storage/framework/views/*.php',
                '<%= pkg.appsPaths %>/**/bootstrap/cache/*.php'
            ]
        },
        shell: {
            installBasic: config.installBasic,
            migrate: config.migrate,
            migrateReset: config.migrateReset,
            writingFolders: config.writingFolders
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-shell');
    
    grunt.registerTask('install', [
        'shell:installBasic'
    ]);
    
    grunt.registerTask('mr', [
        'shell:migrateReset'
    ]);
    
    grunt.registerTask('m', [
        'shell:migrate'
    ]);
    
    grunt.registerTask('writing', [
        'shell:writingFolders'
    ]);
    
};
