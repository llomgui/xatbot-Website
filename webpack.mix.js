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
		'resources/assets/css/icons.css',
		'resources/assets/css/pages.css',
		'resources/assets/css/style.css',
	], 'public/css/app.css')
	.scripts([
		'resources/assets/js/jquery.min.js',
		'resources/assets/js/popper.min.js',
		'resources/assets/js/bootstrap.min.js',
		'resources/assets/js/waves.js',
		'resources/assets/js/jquery.slimscroll.js',
		'resources/assets/js/jquery.scrollTo.min.js'
	], 'public/js/lib.js')
	.scripts([
		'resources/assets/js/jquery.core.js',
		'resources/assets/js/jquery.app.js'
	], 'public/js/app.js')
	.version()
	.copy([
		'./resources/landing/js'
	], 'public/landing/js')
	.copy([
		'./resources/landing/css'
	], 'public/landing/css')
	.copy([
		'./resources/assets/fonts'
	], 'public/fonts')
	.copy([
		'./resources/landing/images'
	], 'public/landing/images')
	.copy([
		'./resources/landing/fonts'
	], 'public/landing/fonts')
	.copy([
		'./resources/assets/pages'
	], 'public/pages')
	.copy([
		'./resources/assets/images'
	], 'public/images', false)
	.copy([
		'./resources/assets/js'
	], 'public/js')
	.copy([
		'./resources/assets/plugins'
	], 'public/plugins', false);