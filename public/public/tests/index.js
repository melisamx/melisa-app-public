var harness = new Siesta.Harness.Browser();

harness.configure({
    title: 'My Tests'
});

harness.start({
    group: 'Application Tests',
    pageUrl: '../../register/?unittest',
    items: [
        '../tests/test1.js'
    ]
});
