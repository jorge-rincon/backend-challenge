<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'body',
        'rating'
    ];

    /**
     * get users for the posts.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // methods
    public function setPost($postsData)
    {   
        Post::upsert(
            [$postsData],
            ['id'],
            ['body']
        );
    }

    public function getUserPost()
    {
        return Post::select('user_id')->distinct()->get();
    }
}
