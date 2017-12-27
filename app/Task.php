<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $table = 'tasks';

    public function emplyee(){
        return $this->belongsTo('APP\User','user_id','id');
    }

    public function scopeOfDay($query ,$day){
        return $query->where('created_at','>=',(new Carbon($day)))
            ->where('created_at','<',((new Carbon($day))->addDay()));
    }
}
