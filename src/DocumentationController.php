<?php

namespace Taboritis\Gitbook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentationController extends Controller
{
    public function article(Request $request, GitbookParser $parser)
    {
        $article = $parser->run();

        return view('docs.article', compact('article'));
    }
}
