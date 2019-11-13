<?php

namespace Taboritis\LaravelGitbookDocs\Filters;

use Parsedown;
use Illuminate\Support\HtmlString;
use Taboritis\LaravelGitbookDocs\Filters;

/**
 * Class MarkdownFilter
 * @package Taboritis\LaravelGitbookDocs\Filters
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