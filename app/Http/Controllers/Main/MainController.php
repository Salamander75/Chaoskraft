<?php

/**
 * Created by PhpStorm.
 * User: Karl
 * Date: 07/08/2016
 * Time: 18:21
 */

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;
use App\Services\MainService\MainService;
use App\Services\UserCommandService\UserCommandService;
class MainController extends Controller
{
    private $userId;
    private $mainService;

    public function __construct() {
        $this->userId = Auth::user()['id'];
        $this->mainService = new MainService();
    }

    public function getView()
    {
        $user_data = $this->mainService->getUserGameData($this->userId);
        return view('main', ['userGameData' => $user_data]);
    }

    public function processUserCommands(Request $request){
        $userCommandService = new UserCommandService();
        if(empty($request['commands'])){
            $userCommandService->deleteOldUserCommands($this->userId);
            return response()->json(['response' => 'Commands deleted!']);
        }
        $validationValue = $userCommandService->validateUserCommands($request['commands']);
        if($validationValue == 1){
            $userCommandService->updateUserCommands($request['commands'],$this->userId);
            return response()->json(['response' => 'Commands have been saved!']);
        }elseif($validationValue == -1){
            return response()->json(['response' => 'Wrong move direction']);
        }elseif($validationValue == -2){
            return response()->json(['response' => 'Resource quantity must be between 1 and 999']);
        }elseif($validationValue == -3){
            return response()->json(['response' => 'Wrong resource to sell']);
        }else {
            return response()->json(['response' => 'Invalid command']);
        }
    }



}