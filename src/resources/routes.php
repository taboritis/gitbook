<?php

Route::get((config('gitbook.route') ?? 'docs'), 'Taboritis\LaravelGitbookDocs\resources\DocumentationController@article');
