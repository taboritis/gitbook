<?php

Route::get((config('gitbook.route') ?? 'docs'), 'Taboritis\LaravelGitbookDocs\DocumentationController@article');
