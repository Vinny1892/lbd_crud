const mix = require('laravel-mix');
require('vuetifyjs-mix-extension')

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
const projectRootCSS = 'resources/css'
const projectRootSCSS = 'resources/scss'
const projectRootJS = 'resources/js'

mix .sass(`${projectRootSCSS}/bootstrap-custom.scss` , 'public/bootstrap/bootstrap-custom.css')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/bootstrap/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/bootstrap/bootstrap.js')
    .styles([`${projectRootCSS}/app.css` , `${projectRootCSS}/form.css` ] , 'public/css/style.css')
    .js(`${projectRootJS}/app.js` , 'public/js/app.js').vuetify()
    .version()
if(!mix.inProduction())  mix.sourceMaps();
mix.browserSync({
    proxy:'http://0.0.0.0:80',
    open:false,
    domain:'0.0.0.0'
})
