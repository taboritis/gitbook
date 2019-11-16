<?php

namespace Taboritis\Gitbook\Filters;

use Taboritis\Gitbook\Filters;

class CodeFilter extends Filters
{
    public function apply()
    {
        $this->replace('class="language-', 'class="');
        return $this->file;
    }
}