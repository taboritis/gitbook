<?php

namespace Taboritis\Gitbook\Filters;

use Parsedown;
use Illuminate\Support\HtmlString;
use Taboritis\Gitbook\Filters;

/**
 * Class MarkdownFilter
 * @package Taboritis\Gitbook\Filters
 */
class MarkdownFilter extends Filters
{
    /**
     * @return HtmlString|mixed
     */
    public function apply()
    {
        return new HtmlString(app(Parsedown::class)->text($this->file));
    }
}