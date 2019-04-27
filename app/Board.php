<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id'); //idをNullでも動かせるようにする

    public static $rules = array(
      'person_id' => 'required',
      'message' => 'required',
    );

    public function getdata(){
      return $this->message.'('.$this->user->name.')';
    }

    // public function person(){
    //   return $this->belongsTo('App\Preson');  //belongToで従テーブルから情報を取り出せるようにする
    // }
    public function person(){
      return $this->belongsTo('App\User');  //belongToで従テーブルから情報を取り出せるようにする
    }
}
