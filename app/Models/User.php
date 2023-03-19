<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';

    public function RegistarUser($first_name, $last_name, $username, $email, $password){
        \DB::table('user')
            ->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'id_role' => 2,
                'is_banned' => 0,
                'active' => 0
            ]);
    }

    public function RegisterAdmin($first_name, $last_name, $username, $email, $password){
        \DB::table('user')
            ->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'id_role' => 1,
                'is_banned' => 0,
                'active' => 0
            ]);
    }

    public function LogInUser($email, $password){
        return User::where(["email" => $email,"password" => $password])->first();
    }
}
