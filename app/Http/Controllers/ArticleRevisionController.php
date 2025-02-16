<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleRevision;
use Illuminate\Http\Request;
use App\Http\Requests\Revisions\UpdateRevisionRequest;
use Symfony\Component\HttpFoundation\Response;

class ArticleRevisionController extends Controller
{
    public function index(Article $article)
    {
        $revisions = $article->revisions;
        return view('articles.revisions.index', compact('article', 'revisions'));
    }

    public function show(Article $article, ArticleRevision $revision)
    {
        return view('articles.revisions.show', compact('article', 'revision'));
    }

    public function revert(Request $request, Article $article, ArticleRevision $revision)
    {
        if (auth()->id() !== $article->user->id) {
            return redirect()->route('articles.show', $article)
                ->with('error', 'Unauthorized action.');
        }

        $article->update([
            'title'       => $revision->title,
            'description' => $revision->description,
            'body'        => $revision->body,
        ]);

        return redirect()->route('articles.show', $article)
            ->with('success', 'Article reverted successfully.');
    }
}
