<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function index($text,$cat){
        if($text == "+"){
            $text="";
        }
        $res = Place::where([["name","LIKE","%$text%"],["id_category",$cat]])->get();
        return  json_encode($res);
    }
    public function subcategory($id){
        $res = Category::where("id_parent",$id)->get();
        return json_encode($res);
    }
}
