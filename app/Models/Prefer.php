<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model{
    protected $table='pref'; 
    public $timestamps=false;

    protected $fillable = [
        'preferente', 'preferito'
    ];
    public function prefers(){
        return $this->belongsToMany("App\Models\User","users","preferente","id");
    }
    public function preferred(){
        return $this->belongsToMany("App\Models\User","users","preferito","id");
    }
}
