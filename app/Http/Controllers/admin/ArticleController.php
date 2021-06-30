<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('author')->get();
        // dd($articles);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.article.add', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $image ='uploads/'.$fileName;
        $article = new Article();
        $article->image = $image;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->posted_by = Auth::user()->id;
        $article->save();
        foreach ($request->tags as $tagItem) {
            $articleTag = new ArticleTag();
            $articleTag->tagId = $tagItem;
            $articleTag->articleId = $article->id;
            $articleTag->save();
        }
        return redirect()->route('admin.article.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path($article->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
            $image ='uploads/'.$fileName;
            $article->update([
                'image' => $image,
            ]);
        }
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('admin.article.index');
    }
    public function tagStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags'
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return Redirect::back()->with('message','New Tag create Successful !');
    }
}
