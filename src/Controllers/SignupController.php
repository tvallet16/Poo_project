<?php
namespace App\Controllers;
session_start();

use App\Repositories\UserRepository;
use App\Repositories\RecipeRepository;

use App\Core\Router\Request;
use App\Core\View;
use App\Models\User;


class SignupController{
    public function createUser(Request $request){
        if ($request->getBody()['psw']===$request->getBody()['vPsw']) {
            $user = new User();
            $user->username = $request->getBody()['username'];
            $user->passeword = md5($request->getBody()['psw']);
            
            if ($user->save()) {
                $_SESSION['checkLog']=true;
                header('Location: /');
            }
        }else {
            header('Location: /');
        }

    }
}