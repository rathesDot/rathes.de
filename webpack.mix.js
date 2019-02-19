let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

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
mix
  .postCss('resources/styles/app.pcss', 'public/css', [
    tailwindcss('./tailwind.js'),
  ])
  .postCss('resources/styles/double-ch.pcss', 'public/css', [
    tailwindcss('./tailwind.js'),
  ])
  .js('resources/js/app.js', 'public/js');