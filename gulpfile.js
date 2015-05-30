var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'prettyPhoto.css',
        'price-range.css',
        'responsive.css',
        'main.css'
    ] , 'public/css/CodeCommerce.css');

    mix.scripts([
        'bootstrap.min.js',
        'contact.js',
        'gmaps.js',
        'html5shiv.js',
        'Jquery.js',
        'Jquery.prettyPhoto.js',
        'Jquery.scrollUp.min.js',
        'main.js',
        'price-range.js'
    ] , 'public/js/CodeCommerce.js');

    mix.version(['css/CodeCommerce.css' , 'js/CodeCommerce.js']);

    mix.copy('resources/assets/fonts' , 'public/build/fonts');

});
