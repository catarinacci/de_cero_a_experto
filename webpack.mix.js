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

mix .js('node_modules/jquery/dist/jquery.js', 'public/js/app.js')
    .js('resources/js/app.js', 'public/js/app.js')
    .js('node_modules/bootstrap/js/dist/dropdown.js', 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.browserSync({
    open: 'external',
    files:['resourse/view/**/*.php', 'app/**/.php', 'routes/**/*.php', 'public/js/*.js','public/css/*.css'],
    proxy: 'http://deceroaexperto.com.devel',
    browser: 'false'
});
