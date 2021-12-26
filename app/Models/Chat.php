<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'chat_lists');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
