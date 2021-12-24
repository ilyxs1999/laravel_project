<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function showArticles(Request $request){
        $category= Category::find($request->input('category_id'));
        if (isset($category)) {
            return view('welcome',['categories'=>[$category]]);
        } else {
            $categories = Category::all();
            return view('welcome',['categories'=>$categories]);
        }
    }

    public function showArticle($article_id){

        $article = Article::find($article_id);

        return view('article.detail',['article'=>$article]);
    }

    public function showUserProfile($user_id){
        $user = User::find($user_id);
        return view('user_profile.user_profile',['user' => $user]);
    }
}
