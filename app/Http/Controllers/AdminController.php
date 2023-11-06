<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminController extends Controller
{

    public function login()
     {
    //     $cozulmusSifre = \Hash::check('asli','$2y$10$9nCADVD69X2sf2gPgF1S8.XRda');
    //     dd([
    //         $cozulmusSifre
    //     ]);
    
        return view("admin.login");
    }

    public function logout() {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }

    public function loginPost(Request $request) {
       $checkUser = Admin::where('email',$request->get('email'))->first();

        if($checkUser && \Hash::check($request->get('password'), $checkUser->password)){
          session()->put('admin', $checkUser);
          return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->withErrors('error login');
        }
    }
    
    public function home(Request $request) {
        return view("admin.home");
    }
    
    
}
