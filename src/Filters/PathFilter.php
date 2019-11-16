<?php

namespace Taboritis\Gitbook\Filters;

use Taboritis\Gitbook\Filters;

class PathFilter extends Filters
{
    public function apply()
    {
        $this->file = str_replace('](', "](?article=", $this->file);
        $this->file = str_replace('.md)', ')', $this->file);

        return $this->file;
    }
}
