<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function store(Request $request){
        $comment = $request->input("comment");
        //$id_user = 1;
        $id_user = session()->get("user")->id;
        $id_shop = $request->input("id_shop");
        $model = new Comment();
        $res = $model->AddComment($id_shop,$id_user,$comment);
        if($res){
            response(json_encode("Uspesno je poslat zahtev za dodavanje mesta!"),204);

        }else{
            response(json_encode("Doslo je do greske"),500);

        }
    }
}
