<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Timeline;
use App\User;

class TimelineController extends Controller
{
  public function index(Request $request){
    if(Auth::check()){
    $items = Timeline::all();
    return view('twitters.home',['items'=>$items]);
  }else{
    $request->session()->flash("msg","ログインが必要です");
    return redirect()->action('TwitterController@getAuth');
    }
  }

  public function add(Request $request){
    if(Auth::check()){
    return view('twitters.tweet');
  }else{
    $request->session()->flash("msg","ログインが必要です");
    return redirect()->action('TwitterController@getAuth');
    }
  }

  public function create(Request $request){
    $username = Auth::user()->name;
    $timeline = new Timeline([
      'message'=>$request->input('message'),
      'name'=>$username,
    ]);
    $timeline->save();
    return redirect('/twitter');
  }
}
