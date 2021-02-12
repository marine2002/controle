<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles', [
            'articles' => Article::paginate(10) //pour retourner 10 articles par 10
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->user()->articles()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        // Autre solution pour créer un article
        // $article = $request->user()->articles()->create($request->all());
        return redirect()->route('articles.show', [$article]);
    }

    /**
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return redirect()->route('articles.show', [$article]);
    }

    /**
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
