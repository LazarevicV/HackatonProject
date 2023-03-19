<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RateController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function store(Request $request){
        try {
            $rate = $request->input("rate");
            $id_user = session()->get("user")->id;
            //$id_user = 2;
            $id_place = $request->input("id_place");
            $model = new Rate();
            $exist = \DB::table("user_shop_rate")->where([["id_user",$id_user],["id_shop",$id_place]])->count() >= 1;
            if($exist == 1) return  Response::json(array('status' => 204, 'message' => "Vec ste uneli ocenu za ovu lokaciju!"));
            $res = $model->Add($id_place, $id_user, $rate);


            return Response::json(array('status' => 204, 'message' => "Uspenso poslato!"));

        }catch (\Exception $e){
            return Response::json(array('status' => 500, 'message' => $e->getMessage()));
        }
    }
}
