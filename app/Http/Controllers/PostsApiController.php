<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postCollection = Post::with('user')->where('id',$id)->get();
        return PostResource::collection($postCollection);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postsTop()
    {
        $modelPost = new Post();
        $usersPost = $modelPost->getUserPost();
        $postsId = array();
        $userTopPosts = array();

        foreach ($usersPost as $key => $userPost) {
            $topPost = $modelPost->getTopUserPost($userPost->user_id);
            array_push($postsId,$topPost[0]->id);
        }
        
        $data = $modelPost->getTopPosts($postsId);
        
        foreach ($data as $key => $value) {
            array_push($userTopPosts,[
                'id' => $value->id,
                'user_id'=> $value->user_id,
                'title'=> $value->title,
                'body'=> $value->body,
                'rating'=> $value->rating,
                'user_name'=> $value->user->name,
            ]);
        }
        $jsonUserTopPosts = json_encode($userTopPosts);
//        dd($jsonUserTopPosts);
        return new PostCollection($jsonUserTopPosts);
    }
}
