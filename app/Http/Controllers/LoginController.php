<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function logout() {
        Session::flush();
        return redirect('login');
    }
   public function login() {
        if(session('user') != null) {
            return redirect("home");
        }
        else {
            return view('login');
        }
     }

     public function checkLogin() {
        $user = User::where('username', request('username'))->first();
         if($user !== null && password_verify(request('password'),$user->password)) {
             Session::put('user', $user->username);
             return redirect('home');
         }
         else {
             $err="credenziali non valide";
             session()->flash('err', $err);//alternativa a with poiché non funziona con redirect
             return redirect('login')->withInput();
            }
     }

}
?>