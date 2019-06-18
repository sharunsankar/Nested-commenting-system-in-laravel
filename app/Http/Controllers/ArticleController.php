<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;
use App\Article;

class ArticleController extends Controller
{
    public function addArticle() {

        if(!Auth::check()) {
            return Redirect::route('login');
        }

        $user  = Auth::user();

        request()->validate([ //validaing the inputs
            'title' => 'required:max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $title = request('title');
        $description = request('description');
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        //Storing to DB
        $article = new Article;
        $article->user()->associate($user);
        $article->title = $title;
        $article->description = $description;
        $article->image_name = $imageName;
        $saved = $article->save();

        if(!$saved){
            App::abort(500, 'Error');
        }

        return back()
            ->with('success','You have successfully posted the article.');

    }

    public function getArticles() {

        if(!Auth::check()) {
            return Redirect::route('login');
        }

        $artcles = Article::all();

        return view('articles')->with('articles',$artcles);

    }

    public function getArticle($id) {

        if(!Auth::check()) {
            return Redirect::route('login');
        }

        $artcle = Article::find($id);

        return view('article')->with('article',$artcle);

    }
}
