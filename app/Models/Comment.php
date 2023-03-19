<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="place_comment";

    public function User()
    {
        return $this->belongsTo(User::Class,"id_user","id");
    }

    protected $filleable = ['id_place',"id_user","comment"];

    public function takeAllCommentsFromPlace($id){
        return \DB::table('place_comment')
            ->where('id_place', $id)
            ->get();
    }

    public function AddComment($id_place,$id_user,$comment){
        $res = Comment::created([
            "id_user" => $id_user,
            "id_place" => $id_place,
            "comment" => $comment
        ]);

        return $res;

    }



}
