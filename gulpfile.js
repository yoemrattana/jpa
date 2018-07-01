var elixir = require('laravel-elixir');

elixir(function(mix){
	mix.sass('app.scss')

	.styles([

		'libs/loginhome.css',
		'libs/jats-main-css.css',
		'libs/style.css',
		'libs/bootstrap-table.min.css'

	], './public/css/libs.css')
	.scripts([

		// 'libs/jquery.js',
		// 'libs/bootstrap.js',
		// 'libs/app.js',
		//'libs/bootstrap3-typeahead.min.js',
		'libs/script.js',
		'libs/bootstrap-table.min.js'
	], './public/js/libs.js')
	
});
