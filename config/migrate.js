module.exports = {
    command: [
        'grunt clean',
        'php core migrate',
        'php forge migrate --database=forge',
        'php people migrate --database=people',
        'php drive migrate --database=drive'
    ].join('&&')
};
