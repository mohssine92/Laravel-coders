const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 | - Laravel mixt es procesador de css y js que viene por defecto con laravel :  requiere instalacion de node.js  npm  => npm install
   - laravel mixt compila rachivos css , js y plugins que suele usar

     en el proyecto npm run dev => se ejecuta compilacion
 */
 /* laravel mixt  ==>  */
mix.js('resources/js/app.js', 'public/js')               /* se compila y el resultado en public/js */
    .postCss('resources/css/app.css', 'public/css', [   /* se compila y el resultado en public/css */
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
