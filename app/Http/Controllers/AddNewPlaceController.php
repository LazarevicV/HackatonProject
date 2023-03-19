<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuggestPlaceRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Ramsey\Uuid\Generator\PeclUuidNameGenerator;

class AddNewPlaceController extends Controller
{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['gradovi'] = City::all();
        $all_category = Category::all();
        $category_parent = [];
        $category_child = [];
        foreach ($all_category as $a){
            if($a->id_parent == null){
                array_push($category_parent,$a);
            }else{
                array_push($category_child,$a);
            }
        }
        $this->data['category_parent'] = $category_parent;
        $this->data['category_child'] = $category_child;


        return view('stranice.send_request_to_add_place', ['data' => $this->data]);
    }

    public function sendRequestToAddPlace(Request $request){

        //$user_id = session()->get('user')->id;
        $user_id = 2;
        $category_id = $request->post('category_id');
        $name = $request->post('name');
        $city_id = $request->post('city_id');
        $address = $request->post('address');
        $description = $request -> post('description');
        $discount = $request -> has('discount');
        $parking = $request -> has('parking');
        $toilet = $request->has('toilet');
        $elevator = $request -> has('elevator');
        $ground_level = $request -> has('ground_level');
        $professional_staff = $request->has('professional_staff');
        $wheelchair_entrance = $request->has('wheelchair_entrance');

        $image = $request->file('image');
        $oldname = $image->getFilename();
        $fileName =uniqid() . '_' . time() . '.' . $image->extension();
        $image->move('public/images/', $fileName);

        try {
            $place = new Place();
            $place->sendRequestToAddPlace($category_id, $city_id, $name, $address, $description, $discount, $parking, $toilet, $elevator, $ground_level, $professional_staff, $wheelchair_entrance, $user_id,$fileName);
           // return Response::json(array('status' => 204, 'message' => "Uspenso poslato!"));
            return back()->with("uspesno","Uspeno ste uneli novu lokaciju");
        }catch (\Exception $e){
            return Response::json(array('status' => 500, 'message' => $e->getMessage()));

        }
    }

    public function  display_form($id=0){
        if($id == 0) {
            redirect("/all-suggested");
            exit;
        }
        $this->data['categories'] = Category::all();
        $this->data['cities'] = City::all();


        $obj = Place::where(["is_verified"=>0,"id"=>$id])->first();

        if(is_null($obj)){
            exit;
            return view("stranice.admin.check-place",['data' => $this->data]);

        }
        $this->data['obj'] = $obj;

        //dd($obj);
        return view("stranice.admin.check-place",['data' => $this->data]);
    }

    public function  verified_place(Request $request){
        try {
            $id = $request->input("id");
            $obj = new Place();
            $adress = $request->input("address");
            $x = $request->input("x");
            $y = $request->input("y");
            $id_category = $request->input("id_category");
            $description = $request->post('description');
            $discount = $request -> input('discount');
            $parking = $request -> input('parking');
            $toilet = $request->input('toilet');
            $elevator = $request -> input('elevator');
            $ground_level = $request -> input('ground_level');
            $professional_staff = $request->input('professional_staff');
            $wheelchair_entrance = $request->input('wheelchair_entrance');
            $res = $obj->VerifyAndUpdate($id,$adress,$x,$y,$description,$discount,$parking,$toilet,$elevator,$ground_level,$professional_staff,$wheelchair_entrance,$id_category);
           // dd($res);
            if($res) {
                return Response::json(array('status' => 204, 'message' => "Uspenso verifikovano!"));
            }else{
                return Response::json(array('status' => 500, 'message' => "Doslo je do greske"));

            }
        }catch (\Exception $e){
            return Response::json(array('status' => 500, 'message' => $e->getMessage()));
        }
    }

    public function allSuggestedIndex(){
        $place = new Place();
        $suggestions = $place->takeAllSuggestions();
        $this->data['suggestions'] = $suggestions;
        return view('stranice.admin.all-suggested', ['data'=>$this->data]);
    }

    public function remove(Request $request){

        $id = $request->input("id");
        if(is_numeric($id)){
            //Place::destroy($id);
            //$date1 = date('Y-m-d H:i:s');
            //$timestamp1 = strtotime($date1);
            \DB::table('place')->where('id', $id)->update([
                "deleted_at" => date('Y-m-d H:i:s')
            ]);
           //\DB::table("Place")->update(["deleted_at"=>$date1]);
            Response::json(array('status' => 200, 'message' => "SVE JE OKEJ!"));
        }
        Response::json(array('status' => 500, 'message' => "Nije uspela veza!"));
    }

}
