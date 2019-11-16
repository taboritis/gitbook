# Introduction
Do you know how simple and pretty can be creating documentation with gitbook.com(http://gitbook.com)?

Now you can use your documentation created at Gitbook directly in laravel project

## Installation 

### 1. Download neccessary packages
``` bash
composer require taboritis/laravel-gitbook-docs
npm i bootstrap font-awesome highlightjs --save
```

### 2. Publish files
``` bash
php artisan vendor:publish --tag=gitbook
```

### 3. Download a repository with your Gitbook documentation
``` bash
git clone https://github.com/taboritis/example-docs docs
```

### 4. Edit a config file
Open /config/gitbook.php
``` php
return [

    'default_route' => '/docs',

    /**
     * CONNECTIONS
     * Path contains a localization of selected folder with github documentation
     * Route returns a route to use a call documentation page
     */
    'repositories' => [

        'docs' => [
            'path' => 'docs',   # directory where gitbook documentation is stored
            'route' => 'docs',  # this route will be registered in your laravel routes
        ],
    ],
];
```

If you need to use many repositories in your project you can do it!
Add a next element to repositories array. 

### 5. Compile assets
Add to webpack.mix.js file these two lines
```javascript
mix.js('resources/js/docs/docs.js', 'public/js');
mix.sass('resources/sass/docs/docs.scss', 'public/css');
```

and tadam...
In your browser fire a path from your config file (default: laravel.test/docs)
