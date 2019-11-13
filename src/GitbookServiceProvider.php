<?php

namespace Taboritis\LaravelGitbookDocs;

use Illuminate\Support\ServiceProvider;

class GitbookServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/resources/gitbook.php' => config_path('gitbook.php'),
        ], 'config');

        include __DIR__ . './resources/routes.php';
    }
}
