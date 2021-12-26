<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Chat;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test(){
        $categories = Category::all();
        return view('test',['categories'=>$categories]);
    }

    public function addComment(Request $request,$id){

        $temp = 0;

       if (Article::find($id)!==null) {
            $comment_text = htmlentities(trim($request->input('text')));
            if (strlen($comment_text)>0) {
                $comment = new Comment();
                $comment->user_id = Auth::user()->id;
                $comment->article_id = $id;
                $comment->text = $comment_text;
                $comment->save();
                return view('article.comment',['comment'=>$comment]);
            }
       }

       return $temp;

    }

    public function writeArticle(){
        $categories = Category::all();
        return view('write_article',['categories'=>$categories]);
    }

    public function saveArticle(Request $request){
        $article = new Article();
        $article->article_title = $request->input('article_title');
        $article->article_description = $request->input('article_description');
        $article->category_id = $request->input('category_id');
        $article->article_text = $request->input('article_text');

        if(isset($_FILES['article_img'])) {
            $current_path = $_FILES['article_img']['tmp_name'];
            $filename = $_FILES['article_img']['name'];
            $new_path = $_SERVER['DOCUMENT_ROOT'].'/'.'article_img'. '/' . $filename;
            move_uploaded_file($current_path, $new_path);
            $article->article_img = $filename;

        }  else dd('fail');

        $article->save();

        return redirect()->route('writeArticle');
    }

    public function postTest(Request $request){
        $info = $request->input('text');
        return view('home',['description'=>$info]);
    }

    private $rules = [
        'email' => 'required|unique:users',
        'name' => 'required|min:3'
        ];

    function validateInfo(Request $request){
        $info = $request->all();
        $rules = array();
        foreach ($info as $key=>$value){
            $rules[$key] = $this->rules[$key];
        }
        $validator = Validator::make($request->all(),$rules);
        return $validator;
    }

    public function editUser(Request $request){
       Auth::id();
       $validator = $this->validateInfo($request);

        if($validator->errors()->any()){
            return $validator->errors()->all();
        } else {
            DB::table('users')
                            ->where('id',Auth::id())
                            ->update($request->all());
            return true;
        }
    }
}
