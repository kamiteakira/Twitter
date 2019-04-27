<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'myname' => 'required',
      'yourname' =>'required'
    );

}
