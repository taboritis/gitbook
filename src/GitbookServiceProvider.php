<?php

namespace Taboritis\LaravelGitbookDocs;

use Illuminate\Support\ServiceProvider;

class GitbookServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'./../resources/views/','laravel-gitbook-docs');
    }

    public function boot()
    {
        $this->publishes([
            $this->getConfigFile() => config_path('gitbook.php'),
            $this->getArticle() => resource_path('views/docs/article.blade.php'),
            $this->getAssets() => resource_path('/sass/docs'),
        ], 'gitbook');

        include __DIR__ . '/routes.php';
    }

    private function getConfigFile()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'gitbook.php';
    }

    private function getArticle()
    {
        return __DIR__ . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'resources' . DIRECTORY_SEPARATOR .
            'views' . DIRECTORY_SEPARATOR .
            'docs' . DIRECTORY_SEPARATOR .
            'article.blade.php';
    }

    private function getAssets()
    {
        return __DIR__ . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'resources' . DIRECTORY_SEPARATOR .
            'sass' . DIRECTORY_SEPARATOR;
    }
}
