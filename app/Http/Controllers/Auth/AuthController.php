<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function getLogin(){
        return view('welcome');
    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->route('welcomePage');
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);
        $redirect = $this->checkCredentials($request);
        return $redirect;
    }

    protected function validateLogin(Request $request){
        $this->validate($request,
            ['email' => 'required',
                'password' => 'required']);

    }

    protected function checkCredentials(Request $request){
        if(!Auth::attempt(
            ['email' => $request['email'],
                'password' => $request['password']])){
            return redirect()->back()->with(['fail' => 'Login failed!']);
        }
        return redirect()->action('Main\MainController@getView');
    }
}
