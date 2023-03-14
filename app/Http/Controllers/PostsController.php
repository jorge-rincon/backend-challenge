<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//models
use App\Models\Post;

class PostsController extends Controller
{

    /**
     * Consultamos los 50 primeros posts de la API
     */
    public function getPosts()
    {
        try{
            
            $posts = array();           

            $cliente = new \GuzzleHttp\Client();
            $host = env('POST_END_POINT');            
            $temp_request = $cliente->GET($host);
            $posts = json_decode($temp_request->getBody(), true);
            $posts = array_slice($posts,0,env('POST_LIMIT'));

            return $posts;
        }catch (\Exception $ex){
            $ex_message = $ex->getMessage();
            $ex_line = $ex->getLine();
            $file = $ex->getFile();

        }
    }

    public function processingPosts()
    {   
        $postModel = new Post();
        $postsData = $this->getPosts();        

        foreach ($postsData as $key => $post) {
            
            $numTitle = str_word_count($post['title'],0);
            $numBody = str_word_count($post['body'],0);

            $totalNumTitle = $numTitle * 2;
            $totalNumBody = $numBody * 1;
            $rating = $totalNumTitle + $totalNumBody;
            $post['rating'] = $rating;
            $post['user_id'] = $post['userId'];
            unset($post['userId']);
            
            $postModel->setPost($post);
        }        
        
    }

    public function getUsersPost()
    {   
        $postModel = new Post();
        $userControl = new UserController();
        $userPostsData = $postModel->getUserPost();

        foreach ($userPostsData as $key => $userPost) {

            $usrData = $userControl->getUserById($userPost->user_id);
            $user['id'] = $usrData['id'];
            $user['name'] = $usrData['name'];
            $user['email'] = $usrData['email'];
            $user['city'] = $usrData['address']["city"];
            //insertamos registros en la tabla users
            $userControl->createUser($user);
        }

    }
}
