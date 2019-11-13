<?php

namespace Taboritis\LaravelGitbookDocs;

abstract class Filters implements GitbookFilterInterface
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }
}