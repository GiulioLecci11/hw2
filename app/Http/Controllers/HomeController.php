<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller {

    public function index() {
        $session = session('user');
        $user = User::where('username',$session)->first();
        if (!isset($user))
            return view('login');
        
        return view("home");
    }

    public function getPost(){
        $posts=array();
        $rows=Post::select("post.id as id", "users.username as username", "post.time as time", "users.postnumber as postnumber", "post.text as text")
        ->join("users","users.id","=","post.user_id")->orderBy('time','DESC')->limit(10)->get();
        foreach($rows as $row){
            $row->time=$this->getTime($row->time);
            $posts[]=$row;
        }        
        return $posts;
    } 
    private function getTime($timestamp) {  
        date_default_timezone_set("Europe/Rome");   //time() dà problemi di fuso orario essendo settato su gmt+0        
        $posted = strtotime($timestamp); 
        $diff = time() - $posted;           
        $posted = date('d/m/y', $posted);

        if ($diff /60 <1) {
            return intval($diff%60)." secondi fa";
        } else if (intval($diff/60) == 1)  {
            return "Un minuto fa";  
        } else if ($diff / 60 < 60) {
            return intval($diff/60)." minuti fa";
        } else if (intval($diff / 3600) == 1) {
            return "Un'ora fa";
        } else if ($diff / 3600 <24) {
            return intval($diff/3600) . " ore fa";
        } else if (intval($diff/86400) == 1) {
            return "Ieri";
        } else if ($diff/86400 < 30) {
            return intval($diff/86400) . " giorni fa";
        } else {
            return $posted; 
        }
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

    public function getSong($song){
        $client_id = 'd9552ed1bd0b4b4f909b8b4c6996eaf5';
        $client_secret = '950b4850d3da47c8a8f78297c6a7a459';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        
        $token = json_decode($result)->access_token;
        switch($song){
            case '1': $data = http_build_query(array("q" => "life's incredible", "type" => "track"));
            break;
            case '2': $data = http_build_query(array("q" => "robot rock", "type" => "track"));
            break;
            case '3': $data = http_build_query(array("q" => "Embraced by the flame", "type" => "track"));
            break;
            case '4': $data = http_build_query(array("q" => "heart of courage", "type" => "track"));
            break;
            default:
        } 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        return $result;

    }
    public function addPost($text){
        $creator = session('user');
        $row= User::where('username',$creator)->first();
        $id = ($row->toArray())['id'];
        Post::create(['text'=> $text, 'user_id'=>$id]);
    }
    public function deletePost($id){
        $creator = session('user');
        $row= User::where('username',$creator)->first();
        $idcreator = ($row->toArray())['id'];
        $deleted= Post::where('user_id',$idcreator)->where('id',$id)->first();
        $deleted->delete();
    }
}
?>