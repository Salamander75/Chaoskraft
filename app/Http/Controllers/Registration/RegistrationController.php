<?php
/**
 * Created by PhpStorm.
 * User: Karl
 * Date: 29/07/2016
 * Time: 17:13
 */

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegistrationService\RegistrationService;
class RegistrationController extends Controller{

    public function processRegistrationRequest(Request $request){
        $this->validateRegistrationData($request);
        $this->addNewUser($request);
        return view('registration', ['success' => 'Registration successful!']);
    }


    private function validateRegistrationData(Request $request){
        $this->validate($request, [
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:8|max:20',
            're-password' => 'required|min:8|max:20|same:password',
            'email' => 'required|email',
            'race' => 'required|alpha'
        ]);
    }

    private function addNewUser(Request $request){
        $registrationService = new RegistrationService();
        $registrationService->addNewUser($request);
    }

}