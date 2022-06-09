<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table='users'; //non necessario perché tabella rispecchia già la convenzione dei nomi
    public $timestamps=false;
    protected $fillable = [
        'username', 'password', 'email'
    ];


    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
