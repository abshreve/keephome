const mix = require('laravel-mix');

mix.js('js/imports.js', 'js/main.js')
.js('js/admin.js', 'js/main-admin.js')
// .extract() // pulls npm js to a vendor file
.sass('scss/imports.scss', 'css/main.css')
.sass('scss/admin.scss', 'css/admin.css')
.options({
  // Allows us to use relative paths (e.g. background-img: url()) in scss files.
  processCssUrls: false
  // purifyCss: true
})
.autoload({
  jquery: ['$', 'jQuery']
})
// Where mix-manifest.json is saved.
.setPublicPath('/') //copy resources from here...
.setResourceRoot('/') //to here.
// Extra debug info for compiled files.
.sourceMaps();


// Check package.json for more autoprefixer settings.
// @docs: https://github.com/browserslist/browserslist
mix.webpackConfig({
	resolve: {
		alias: {
			'js': path.resolve(__dirname, '/js'),
			'lib': path.resolve(__dirname, '/js/lib'),
			'modules-root': path.resolve(__dirname, 'js/classes')
		}
	}
})