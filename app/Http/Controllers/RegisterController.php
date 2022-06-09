<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller {
    protected function register()
    {
        $request = request();
        if($this->countErrors($request) === 0) {
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => password_hash(request('password'),PASSWORD_BCRYPT),
            'email' => $request['email']
            ]);
            if ($newUser) {
                Session::put('user', $newUser->username);
                return redirect('home');
            } 
            else {
                $err="Inserimento non riuscito";
                session()->flash('err', $err);
                return redirect('signin')->withInput(); //campi già compilati riappaiono
            }
        }
        else 
            return redirect('signin')->withInput();
        
    }

    private function countErrors($data) {
        $error = array();
        $errs= array();
        //codice del file signin.php del vecchio hw
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        if (strlen($data["password"]) < 8 || strlen($data["password"])>20 ) {
            $error[] = "Lunghezza password non adatta";
        } 
        $n_errors=count($error);
        foreach($error as $key=>$value) { 
            $errs = implode(" ",$error); 
            }  
        session()->flash('err',$errs);
        //return count($error);
        return $n_errors;
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('signin');
    } 

}
?>