const { mix } = require('laravel-mix');

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

mix.styles([
		'resources/assets/css/bootstrap.min.css',
		'resources/assets/css/core.css',
		'resources/assets/css/icons.css',
		'resources/assets/css/components.css',
		'resources/assets/css/pages.css',
		'resources/assets/css/menu.css',
		'resources/assets/css/responsive.css'
	], 'public/css/app.css')
	.scripts([
		'resources/assets/js/modernizr.min.js',
		'resources/assets/js/jquery.min.js',
		'resources/assets/js/bootstrap.min.js',
		'resources/assets/js/detect.js',
		'resources/assets/js/fastclick.js',
		'resources/assets/js/jquery.slimscroll.js',
		'resources/assets/js/jquery.blockUI.js',
		'resources/assets/js/waves.js',
		'resources/assets/js/wow.min.js',
		'resources/assets/js/jquery.nicescroll.js',
		'resources/assets/js/jquery.scrollTo.min.js',
		'resources/assets/js/jquery.core.js',
		'resources/assets/js/jquery.app.js'
	], 'public/js/app.js')
	.version()
	.copy([
		'./resources/assets/fonts'
	], 'public/fonts');