module.exports = {
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
        'chmod -R 777 App/Panel/bootstrap'
    ].join('&&')
};