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
 * @package Taboritis\LaravelGitbookDocs
 */
class GitbookParser
{
    /**
     * @var mixed
     */
    public $directory;

    /**
     * @var array
     */
    protected $filters = [
        PathFilter::class,
        MarkdownFilter::class,
        HintsFilter::class,
    ];

    /**
     * @var \Illuminate\Config\Repository
     */
    private $connection;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $uri;

    /**
     * GitbookParser constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->uri = $request->getRequestUri();

        $this->path = ($request->article ?? 'SUMMARY') . '.md';

        $this->directory = $this->getDirectory();
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

    /**
     * It returns requested file
     * 
     * @return string
     * @throws \Exception
     */
    private function getFile()
    {
        try {
            return File::get("./../{$this->directory}/{$this->path}");
        } catch (FileNotFoundException $exception) {
            throw new  \Exception('Documentation not found');
        }
    }

    /**
     * It return URI where documentation is stored
     *
     * @return string
     */
    private function getDirectory()
    {
        $config = config('gitbook');

        foreach ($config['repositories'] as $connection) {
            if ($this->uri === '/' . $connection['route']) {
                return $this->directory = $connection['path'];
            }
        }

        return 'docs';
    }
}
