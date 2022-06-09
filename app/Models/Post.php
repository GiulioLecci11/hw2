<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $table='post';
    public $timestamps=false;
    protected $fillable = [
        'user_id', 'text', 'time'
    ];

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}