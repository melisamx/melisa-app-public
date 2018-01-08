module.exports = {
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
};
