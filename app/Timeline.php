<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $guarded = array('id');

    public function getData(){
      return $this->message;
    }

    public function getName(){
      return $this->name;
    }

    public function getTime(){
      return $this->updated_at;
    }



    public function person(){
      return $this->belongsTo('App\User');
    }
}
