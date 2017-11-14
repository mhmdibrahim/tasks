<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function emplyee(){
        return $this->belongsTo('APP\User','user_id','id');
    }

}
