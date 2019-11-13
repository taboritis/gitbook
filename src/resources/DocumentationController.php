<?php

namespace Taboritis\LaravelGitbookDocs\resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Taboritis\LaravelGitbookDocs\GitbookParser;

class DocumentationController extends Controller
{
    public function article(Request $request, GitbookParser $parser)
    {
        $article = $parser->run();;

        return view('article', compact('article'));
    }
}
