<?php

return [

    'default_route' => '/docs', # a URi in a logo button

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
