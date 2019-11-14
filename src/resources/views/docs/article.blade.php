<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <title>Documentation</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <a href="{{ config('gitbook.route') ?? '/docs' }}" class="no-decoration">
            {{ config('gitbook.name') ?? 'Gitbook Documentation' }}
        </a>
    </div>
</header>
<div class="container documentation">
    <div class="card card-body">
        {!! $article !!}
    </div>
</div>
</body>
