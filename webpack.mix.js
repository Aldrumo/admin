const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('./')
mix.js('resources/js/app.js', 'resources/dist/js')
    .js('resources/js/editor.js', 'resources/dist/js')
    .copy('node_modules/tinymce/skins', 'resources/dist/js/skins')
    .copy('node_modules/tinymce/icons', 'resources/dist/js/icons')
    .postCss('resources/css/app.css', 'resources/dist/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
