<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserById($userId)
    {       
        try{
            
            $users = array();           

            $cliente = new \GuzzleHttp\Client();
            $host = env('USER_END_POINT') . $userId;            
            $temp_request = $cliente->GET($host);
            $users = json_decode($temp_request->getBody(), true);
            
            return $users;

        }catch (\Exception $ex){
            $ex_message = $ex->getMessage();
            $ex_line = $ex->getLine();
            $file = $ex->getFile();

        }
    }

    public function createUser($datUsers)
    {
        $modelUser = new User();
        $modelUser->insertUser($datUsers);
    }
}
