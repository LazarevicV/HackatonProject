<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected  $table ="user_shop_rate";
    protected $fillable = ['id_user',"id_shop","rate"];

    public function Add($id_place,$id_user,$rate){
       return \DB::table("user_shop_rate")->insert([
            "id_shop" => $id_place,
            "id_user"=>$id_user,
            "rate" => $rate
        ]);
    }


}
