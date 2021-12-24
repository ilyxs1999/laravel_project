<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['article_title','article_description','article_text'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public static function articlesDESC(){
        return Article::orderBy('created_at','desc')->get();
    }
}
