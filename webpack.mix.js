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
   .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    resolve: {
        alias: {
            "@environment" : path.resolve(__dirname,"resources/js/environment"),
            "@components"  : path.resolve(__dirname,"resources/js/components"),
            "@filters"     : path.resolve(__dirname,"resources/js/filters"),
            "@services"    : path.resolve(__dirname,"resources/js/services"),
            "@store"       : path.resolve(__dirname,"resources/js/store")
        }
    }
});
