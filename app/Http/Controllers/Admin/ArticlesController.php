<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ArticlesController extends Controller
{
    public function index(Request $request){
        $articles = Article::with(['category:id,name'])->latest()->simplePaginate(10);
        
        return Inertia::render('Articles/Index',[
            'articles' => ArticleResource::collection($articles)
        ]);
    }

    public function create(Request $request){
        return Inertia::render('Articles/Create',[
            "edit" => false,
            "article" => (object)[]
         ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'slug' => ['required','string',Rule::unique(Article::class)]
        ]);

        Article::create($data);

        return redirect()->route('articles.index')
        ->with('success','Article stored successfully');
    }

    public function edit(Article $article){
        return Inertia::render('Article/Create',[
            "edit" => true,
            "article" => new ArticleResource($article)
        ]);
    }

    public function update(Request $request, Article $article){
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'slug' => ['required','string',Rule::unique(Article::class)->ignore($article->id)]
        ]);

        $article->update($data);

        return redirect()->route('article.index')
        ->with('success','Article updated successfully');
    }

    public function destroy(Article $article){

        $article->delete();

        return redirect()->route('article.index')
        ->with('success','Article deleted successfully');
    }
}
