<?php
/**
 * Created by PhpStorm.
 * User: Karl
 * Date: 12/08/2016
 * Time: 22:01
 */
namespace App\Services\UserCommandService;
use \App\Resources;
use App\User;
use Log;
use App\UserCommand;
use DB;
class UserCommandService{

    public function validateUserCommands($commands){
        $splittedUserCommandsByComma = explode(",", $commands);
        
        foreach ($splittedUserCommandsByComma as $user_command){
            $userCommandSplittedBySpace = explode(" ",$user_command);
            $commandType = trim($userCommandSplittedBySpace[0]);
            switch($commandType){
                case "move":
                    $direction = $userCommandSplittedBySpace[1];
                    if(!in_array($direction, ["north", "south", "west", "east"]) ){
                        return -1;
                    }
                    break;
                case "sell":
                    $quantity = intval($userCommandSplittedBySpace[1]);
                    $resource_to_sell = $userCommandSplittedBySpace[2];
                    if($quantity < 1 || $quantity > 999){
                        return -2;
                    }
                    // TODO: It might be that resouces list is going to be database table values instead of static array
                    if(!in_array($resource_to_sell, Resources::$resources)){
                        return -3;
                    }
                    break;
                default:
                    return 0;
            }
        }
        return 1;
    }
    
    public function updateUserCommands($userCommands, $userId){
        $this->deleteOldUserCommands($userId);
        $this->addNewUserCommands($userCommands, $userId);
    }

    private function addNewUserCommands($userCommands, $userId){
        $splitted_commands = explode(",", $userCommands);
        foreach($splitted_commands as $command){
            $user_command = new UserCommand();
            $user_command->user_id = $userId;
            $user_command->command = trim($command);
            $user_command->save();
        }
    }

    public function deleteOldUserCommands($userId){
        DB::table('user_commands')->where('user_id', $userId)->delete();
    }


}