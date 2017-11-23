<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    public $timestamps = false ;
    public function employees (){
        return $this->hasMany('App\User');
    }

    public function tasks(){
        return $this->hasManyThrough('App\Task','App\User');
    }
}
