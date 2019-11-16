<?php

namespace Taboritis\Gitbook;

/**
 * Interface GitbookFilterInterface
 * @package Taboritis\Gitbook
 */
interface GitbookFilterInterface
{
    /**
     * @return mixed
     */
    public function apply();
}