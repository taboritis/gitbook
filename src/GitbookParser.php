<?php

namespace Taboritis\LaravelGitbookDocs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Taboritis\LaravelGitbookDocs\Filters\PathFilter;
use Taboritis\LaravelGitbookDocs\Filters\HintsFilter;
use Taboritis\LaravelGitbookDocs\Filters\MarkdownFilter;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class GitbookParser
 *
 * @package Taboritis\LaravelGitbookDocs
 */
class GitbookParser
{
    protected $filters = [
        PathFilter::class,
        MarkdownFilter::class,
        HintsFilter::class,
    ];

    /**
     * @var string
     */
    private $path;

    /**
     * @var mixed
     */
    private $directory;

    /**
     * GitbookParser constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->path = ($request->article ?? 'SUMMARY') . '.md';

        $this->directory = config('gitbook.path') ?? 'docs';
    }

    /**
     * Handler
     */
    public function run()
    {
        $file = $this->getFile();

        foreach ($this->filters as $filter) {
            $filter = new $filter($file);
            $file = $filter->apply($file);
        }

        return $file;
    }

    private function getFile()
    {
        try {
            return File::get("./../{$this->directory}/{$this->path}");
        } catch (FileNotFoundException $exception) {
            return response('File not found', 404);
        }
    }
}
