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
class MainController extends Controller
{
    public function getView()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        return view('dashboard');
    }

}