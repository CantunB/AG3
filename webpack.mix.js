const mix = require('laravel-mix');
    mix.js('resources/js/app.js', 'public/js');
    // .vue()

    //mix.js('resources/js/app.js', 'public/js')
    //.sass('resources/sass/app.scss', 'public/css')
mix.browserSync({
        proxy: 'http://127.0.0.1:8000',
        //proxy: 'http://ag3_web.test',
        files: [
            'app/**/*',
            'resources/views/**/*',
            'public/css/*',
            'resources/lang/**/*',
            'routes/**/*'
        ]
});
