<?php
/**
 * Created by PhpStorm.
 * User: Karl
 * Date: 12/08/2016
 * Time: 21:02
 */
namespace App\Services\MainService;
use Log;
use DB;
class MainService{

    public function getUserGameData($userId){
        $user_data = DB::select(DB::raw("SELECT a.username, b.command FROM users a 
            LEFT JOIN user_commands b ON a.id=b.user_id 
            WHERE a.id= :user_id"), array( 'user_id' => $userId,));
        return $user_data;
    }
}