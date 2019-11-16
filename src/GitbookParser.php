<?php

namespace Taboritis\Gitbook;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Taboritis\Gitbook\Filters\PathFilter;
use Taboritis\Gitbook\Filters\CodeFilter;
use Taboritis\Gitbook\Filters\HintsFilter;
use Taboritis\Gitbook\Filters\MarkdownFilter;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class GitbookParser
 * @package Taboritis\Gitbook
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
        CodeFilter::class,
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
        $this->uri = substr($request->getRequestUri(), 1);

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
        $uri = explode('?',$this->uri)[0];

        $config = config('gitbook');

        foreach ($config['repositories'] as $connection) {
            if ($uri === $connection['route']) {
                return $this->directory = $connection['path'];
            }
        }

        return 'docs';
    }
}
