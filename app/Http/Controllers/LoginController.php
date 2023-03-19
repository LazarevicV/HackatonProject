<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct(){
        parent::__construct();
    }
    public function login(LoginRequest $request){

        $email = $request->input("email");
        $password = $request->input("password");
        $model = new User();
        $password = md5($password);
        $res = $model->LogInUser($email,$password);

        if($res == null){
            return back()->with("invalid_login","Pogresna email adresa ili lozinka");
        }
        session()->put("user",$res);

        return redirect("/");
    }
    public function Logout(){
       // dd("ok");
        session()->remove("user");
       return  redirect("/");
    }
}

