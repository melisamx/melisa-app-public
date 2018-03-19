module.exports = {
    command: [
        'grunt clean',
        'php core migrate:reset',
        'php forge migrate:reset --database=forge',
        'php people migrate:reset --database=people',
        'php drive migrate:reset --database=drive'
    ].join(' && ')
};
