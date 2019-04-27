<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    public function index(){
      $users = User::all();
      // foreach ($users as $key => $value) {
      //   var_dump($value->id);
      //   var_dump($value->name);
      //   var_dump($value->email);
      // }
      // // foreach ($users as $key => $value) {
      //   var_dump($value->id);
      // }
      return view('users.index',["users"=>$users]);
    }
}
