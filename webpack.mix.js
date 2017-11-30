let mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('/assets/');

mix.js('resources/assets/js/app.js', 'assets/backend/js')
   .sass('resources/assets/sass/app.scss', 'assets/backend/css');
