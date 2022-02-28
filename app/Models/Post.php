<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['post_image'];
 
    /**
     * 投稿を保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
