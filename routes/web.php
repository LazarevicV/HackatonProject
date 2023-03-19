<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\IsLogIn;
use App\Http\Middleware\NotLogIn;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(NotLogIn::class);

Route::get('/registration', [\App\Http\Controllers\RegisterController::class, 'register'])->name("register")->middleware(IsLogIn::class);
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'registerUser'])->middleware(IsLogIn::class);


Route::get('/add-new-place', [\App\Http\Controllers\AddNewPlaceController::class, 'index'])->name("add-new-place")->middleware(NotLogIn::class);
Route::post('/send_request_to_add_place', [\App\Http\Controllers\AddNewPlaceController::class, 'sendRequestToAddPlace'])->name("send_request")->middleware(NotLogIn::class);
Route::get('/all-places', [\App\Http\Controllers\AllPlacesUserController::class, 'index'])->name('all-places-route')->middleware(NotLogIn::class);
Route::get('place-info/{id?}', [\App\Http\Controllers\PlaceInfoController::class, 'index'])->name('place-info-page')->middleware(NotLogIn::class);
/*ADMIN*/
Route::get("/all-suggested",[\App\Http\Controllers\AddNewPlaceController::class,"allSuggestedIndex"])->name("all-suggested")->middleware(Admin::class);
Route::get("/form-for-verify/{id?}",[\App\Http\Controllers\AddNewPlaceController::class, "display_form"])->name("form-verify")->middleware(Admin::class);
Route::post('/verified_place', [\App\Http\Controllers\AddNewPlaceController::class, 'verified_place'])->name("verified_place")->middleware(Admin::class);
Route::delete('/removeSuggest', [\App\Http\Controllers\AddNewPlaceController::class, 'remove'])->name("removeSuggest")->middleware(Admin::class);

/*ENDADMIN*/

Route::post("/add-rate",[\App\Http\Controllers\RateController::class,"store"])->name("add-rate")->middleware(NotLogIn::class);

//->middleware(NotLogIn::class);
//->middleware(Admin::class);
Route::post("/add-comment",[CommentController::class,"store"])->name("store-comment")->middleware(NotLogIn::class);
Route::get('/login',function(){return view("stranice.login");})->name("login")->middleware(IsLogIn::class);
Route::get("/logout",[LoginController::class,"Logout"])->name("logout")->middleware(NotLogIn::class);

Route::post('/loginUser',[LoginController::class,"login"])->name("loginUser")->middleware(IsLogIn::class);;

/*SEARCH START*/
ROute::get("filter/{text?}/{id?}",[SearchController::class,"index"])->name("filter")->middleware(NotLogIn::class);
ROute::get("subcategory/{id?}",[SearchController::class,"subcategory"])->name("subcategory")->middleware(NotLogIn::class);
/*SEARCH END*/
