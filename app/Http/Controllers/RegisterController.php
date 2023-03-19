<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function register(Request $request){
        return view('stranice.register');
    }

    public function registerUser(RegistrationRequest $request){
        $first_name = $request->post('first_name');
        $last_name = $request->post('last_name');
        $username = $request->post('username');
        $email = $request->post('email');
        $password = md5($request->post('password'));

        try {
            $userModel = new User();
            $userModel->RegistarUser($first_name, $last_name, $username, $email, $password);
            return Response::json(array('status' => 200, 'message' => 'Uspesna registracija!'));
        }catch (Exception $e){
            return Response::json(array('status' => 500, 'message' => $e->getMessage()));
        }
    }

    public function registerAdmin(RegistrationRequest $request){
        $first_name = $request->post('first_name');
        $last_name = $request->post('last_name');
        $username = $request->post('username');
        $email = $request->post('email');
        $password = md5($request->post('password'));

        try {
            $userModel = new User();
            $userModel->RegisterAdmin($first_name, $last_name, $username, $email, $password);
            return Response::json(array('status' => 200, 'message' => 'Uspesna registracija!'));
        }catch (Exception $e){
            return Response::json(array('status' => 500, 'message' => $e->getMessage()));
        }
    }
}
