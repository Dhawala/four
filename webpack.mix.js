const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js([
        'resources/js/dashboard.js'
    ], 'public/js/dashboard.js')
    //sb admin
    .copy('node_modules/startbootstrap-sb-admin-2/css/*',
        'public/css/')
    .copy('node_modules/startbootstrap-sb-admin-2/js/*',
        'public/js/')
    .copy('node_modules/startbootstrap-sb-admin-2/img/*',
        'public/img/')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/*',
        'public/js/')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/jquery/*',
        'public/js/')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/datatables/*',
        'public/js/datatables/')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/*',
        'public/js/')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/dashboard.css',
    ], 'public/css/dashboard.css')
    .sourceMaps();
