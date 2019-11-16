<?php

namespace Taboritis\LaravelGitbookDocs\Filters;

use Taboritis\LaravelGitbookDocs\Filters;

class CodeFilter extends Filters
{
    public function apply()
    {
        $this->replace('class="language-', 'class="');
        return $this->file;
    }
}