<?php
namespace App\Controllers;
session_start();

use App\Repositories\UserRepository;
use App\Repositories\RecipeRepository;

use App\Core\Router\Request;
use App\Core\View;
use App\Models\User;


class LoginController {

    public function log(Request $request){
        $username=$request->getBody()['username'];
        $psw=$request->getBody()['psw'];
        $users =User::all();
        foreach($users as $user){
            if ($user->getUsername()===$username && $user->getPasseword()===md5($psw) ) {
                $_SESSION['checkLog']=true;
                
            }
        }
        header('Location: /');
    }
    public function logout(){
        session_destroy();
        header('Location: /');
    }
}