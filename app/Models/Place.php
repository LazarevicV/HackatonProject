<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'place';

    public function sendRequestToAddPlace($category_id, $city_id, $name, $address, $description, $discount, $parking, $toilet, $elevator, $group_level, $professional_staff, $wheelchair_entrance, $user_suggested,$fileName){
        \DB::table('place')
            ->insert([
                'id_category' => $category_id,
                'id_city' => $city_id,
                'name' => $name,
                'address' => $address,
                'description' => $description,
                'discount' => $discount,
                'parking' => $parking,
                'wc' => $toilet,
                'elevator' => $elevator,
                'ground_level' => $group_level,
                'professional_staff' => $professional_staff,
                'wheelchair_entrance' => $wheelchair_entrance,
                'is_verified' => 0,
                "src" => $fileName,
                "alt" => $name,
                'user_suggested' => $user_suggested
            ]);
    }

    public function VerifyAndUpdate($id,$adress,$x,$y,$description,$discount,$parking,$toilet,$elevator,$ground_level,$professional_staff,$wheelchair_entrance,$id_category){
        $obj = Place::find($id);

            $obj->address = $adress;
            $obj->x_cordinate = $x;
            $obj->y_cordinate = $y;
            $obj->description = $description;
            $obj->discount = $discount;
            $obj->parking = $parking;
            $obj->wc = $toilet;
            $obj->elevator = $elevator;
            $obj->ground_level = $ground_level;
            $obj->professional_staff = $professional_staff;
            $obj->wheelchair_entrance = $wheelchair_entrance;
            $obj->id_category = $id_category;
            $obj->is_verified = 1;
            //echo json_encode($obj);
            $obj->save();

        return false;
    }

    public function takeAllSuggestions(){
        return \DB::table('place')
            ->where(['is_verified'=> 0,"deleted_at" => null])
            ->get();
    }
}
