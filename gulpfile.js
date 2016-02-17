var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
 'jquery': './vendor/bower_components/jquery/',
 'bootstrap': './vendor/bower_components/bootstrap/',
 'angular': './vendor/bower_components/angular/',
 'font_awesome': './vendor/bower_components/font-awesome',
 'chart_js': './vendor/bower_components/Chart.js/',
 'angular_charts': './vendor/bower_components/angular-chart.js/'
};

/**
 * Mix scripts
 */
elixir(function(mix) {
     mix.scripts([
       paths.jquery    + 'dist/jquery.min.js',
       paths.angular   + 'angular.min.js',
       paths.bootstrap + 'dist/js/bootstrap.min.js',
       paths.chart_js  + 'Chart.min.js',
       paths.angular_charts + 'dist/angular-chart.min.js'

     ], 'public/js/app.js')
});

/**
 * Mix stylesheets
 */
elixir(function(mix) {
     mix.styles([
       paths.bootstrap + 'dist/css/bootstrap.min.css',
       paths.font_awesome + '/css/font-awesome.min.css',
       paths.angular_charts + 'dist/angular-chart.min.css'

     ], 'public/css/app.css');
});

/**
 * Copy fonts
 */
elixir(function(mix) {
     mix.copy(paths.bootstrap + 'fonts/**', 'public/fonts')
        .copy(paths.font_awesome + '/fonts/**', 'public/fonts');
});