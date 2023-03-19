<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceInfoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id){
        $place = Place::find($id);
        $br = \DB::table("user_shop_rate")->join("place","user_shop_rate.id_shop","=","place.id")->where("place.id",$id)->sum("rate");
        $br_count = \DB::table("user_shop_rate")->join("place","user_shop_rate.id_shop","=","place.id")->where("place.id",$id)->count();
        $this->data['rate'] = $br;
        $this->data['rate_count'] = $br_count;
        $this->data['place'] = $place;
        $place = new Comment();
        $all_users = User::all();
        $this->data['all_users'] = $all_users;
        $comments = $place->takeAllCommentsFromPlace($id);
        $this->data['comments'] = $comments;
        return view('stranice.place-info', ['data' => $this->data]);
    }
}
