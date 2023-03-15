<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getTopUserPost($idUser)
    {
        return DB::table('posts as p')
                   ->where('p.user_id',$idUser)
                   ->select(DB::raw('max(p.rating),p.id'))
                   ->get();
    }

    public function getTopPosts($idsPost)
    {
        return Post::with('user')->whereIN('id',$idsPost)->get();
    }
}
