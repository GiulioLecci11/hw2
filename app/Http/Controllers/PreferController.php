<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Pref;
use Illuminate\Support\Facades\DB; //ROBE CON RAW QUERIES

class PreferController extends Controller {

    public function index() {
        return view('prefer');
    } 
    public function getUser(){
        $utenti= array();
        $user = session('user');
        $rows=User::where('username','!=',$user)->orderBy('postnumber','DESC')->get();
        $utenti=$rows->toArray();
        return $utenti;
    }
    public function getStats(){
        $profile= array();
        $session = session('user');
        $row = User::where('username',$session)->first();
        $userinfo=$row->toArray();
        if($userinfo["postnumber"]<=0){
            $url="../public/imgs/1.jpg";
            $songReq=1;
        }
        else if ($userinfo["postnumber"]>0 && $userinfo["postnumber"]<=4){
            $url="../public/imgs/2.jpg";
            $songReq=2;
        }
        else if ($userinfo["postnumber"]>4 && $userinfo["postnumber"]<=9){
            $url="../public/imgs/3.jpg";
            $songReq=3;
        }
        else{$url="../public/imgs/4.jpg";
            $songReq=4;}
        $profile[] = array( 'usern'=>$userinfo['username'],'url'=>$url,'songReq'=>$songReq, 'postnumber' => $userinfo["postnumber"]);
        return $profile;
    }
    public function getPref(){
        $utenti=array();
        $preferente=session('user');
        $rows= DB::select("SELECT users.id as id, users.username as username, users.postnumber as postnumber, users.email as email 
        FROM users inner join pref on users.id=pref.preferito
        WHERE preferente = (SELECT id FROM users where username='$preferente') ORDER BY users.postnumber DESC");
        //VA BENE IL RAW QUERIES COSI??????
        foreach($rows as $row){
            $utenti[]=$row;
        }
        return $utenti;
    }
    public function addPref($userid){
        $preferente=session('user');
        $id=User::where('username',$preferente)->first();
        $res=Pref::where('preferito',$userid)->where('preferente',$id['id'])->first();
        if(!isset($res)){
            $newPref= new Pref;
            $newPref->preferito=$userid;
            $newPref->preferente=$id['id'];
            $newPref->save();
        }
    }
    public function removePref($userid){
        $preferente=session('user');
        $id=User::where('username',$preferente)->first();
        $deleted=Pref::where('preferito',$userid)->where('preferente',$id['id'])->first();
        $deleted->delete();
    }
}
?>