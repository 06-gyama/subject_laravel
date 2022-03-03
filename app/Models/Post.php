<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'post_image',
        'post_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'post_at',
        'deleted_at',
    ];
 
    /**
     * 投稿を保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
