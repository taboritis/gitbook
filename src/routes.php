<?php

if (config('gitbook')) {
    foreach (config('gitbook.repositories') as $connection => $data) {
        Route::get($data['route'], 'Taboritis\Gitbook\DocumentationController@article');
    }
}
