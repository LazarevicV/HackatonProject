<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class AllPlacesUserController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $places = Place::where('is_verified', 1)->get();
        $this->data['places'] = $places;
        return view('stranice.all-places', ['data'=>$this->data]);
    }
}
