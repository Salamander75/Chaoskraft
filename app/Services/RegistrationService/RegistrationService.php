<?php
/**
 * Created by PhpStorm.
 * User: Karl
 * Date: 29/07/2016
 * Time: 17:44
 */
namespace App\Services\RegistrationService;

use \Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use \App\World;
class RegistrationService {


    public function addNewUser(Request $request){
        $new_user = new User();
        $new_user->username = $request['username'];
        $new_user->email = $request['email'];
        $new_user->password = $this->hashPassword($request['password']);
        $new_user->race = $request['race'];
        //TODO: In future there is probably going to be world tier logic, therefore extra logic might come here
        $new_user->world_id = World::all()->random(1)->value('world_id');
        $new_user->save();
    }

    private function hashPassword($passWord){
        $hashedPassword = Hash::make($passWord);
        return $hashedPassword;
    }

}