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

mix.js('resources/js/client/app.js', 'public/js/client')
    .js('resources/js/admin/admin.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css');
