<?php

namespace Taboritis\LaravelGitbookDocs;

abstract class Filters implements GitbookFilterInterface
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    protected function replace($search, $replace)
    {
       $this->file = str_replace($search, $replace, $this->file);
    }

}