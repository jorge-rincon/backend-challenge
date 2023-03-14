<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $posts = array_slice($posts,0,50);
                        
            return $posts;
        }catch (\Exception $ex){
            $ex_message = $ex->getMessage();
            $ex_line = $ex->getLine();
            $file = $ex->getFile();

        }
    }
}
