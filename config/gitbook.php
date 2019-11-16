<?php

return [

    'default_route' => '/docs',

    /**
     * CONNECTIONS
     * Path contains a localization of selected folder with github documentation
     * Route returns a route to use a call documentation page
     */

    'repositories' => [

        'docs' => [
            'path' => 'docs',
            'route' => 'docs',
        ],
    ],

];
