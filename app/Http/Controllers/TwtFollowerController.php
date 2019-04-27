<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;

class TwtFollowerController extends Controller
{

  //フォロー機能
      public function follow(Request $request){
        $name = Auth::user()->name;
        $user = new  Follower ([
          'yourname' => $request->input('yourname'),
          'myname' => $name,
        ]);
        $user->save();
        return view('twitters.friends');
      }

}
