module.exports = function(grunt) {
    
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
                '<%= pkg.appsPaths %>/**/storage/logs/*.log'
            ]
        },
        shell: {
            installBasic: {
                command: [
                    'grunt clean',
                    'php core seeders',
                    'php sencha seeders',
                    'php events seeders',
                    'php artisan seeders',
                    'php forge seeders',
                    'php panel seeders',
                    'php security seeders',
                    'php people seeders',
                    'php drive seeders',
                    'php panel seeders'
                ].join('&&')
            },
            writingFolders: {
                command: [
                    'chmod -R 777 App/Core/storage',
                    'chmod -R 777 App/Core/bootstrap',
                    'chmod -R 777 App/Sencha/storage',
                    'chmod -R 777 App/Sencha/bootstrap',
                    'chmod -R 777 App/Events/storage',
                    'chmod -R 777 App/Events/bootstrap',
                    'chmod -R 777 App/Guest/storage',
                    'chmod -R 777 App/Guest/bootstrap',
                    'chmod -R 777 App/Forge/storage',
                    'chmod -R 777 App/Forge/bootstrap',
                    'chmod -R 777 App/Panel/storage',
                    'chmod -R 777 App/Panel/bootstrap',
                    'chmod -R 777 App/People/storage',
                    'chmod -R 777 App/People/bootstrap',
                    'chmod -R 777 App/Drive/storage',
                    'chmod -R 777 App/Drive/bootstrap',
                    'chmod -R 777 App/Panel/storage',
                    'chmod -R 777 App/Panel/bootstrap',
                ].join('&&')
            }
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-shell');
    
    grunt.registerTask('install', [
        'shell:installBasic'
    ]);
    
    grunt.registerTask('writing', [
        'shell:writingFolders'
    ]);
    
};
