<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function index(Request $request){
      $items = Board::all();
      return view('twitters.home',['items' => $items]);
    }

    public function add(Request $request){
      return view('board.add');
    }

    public function create(Request $request){
      $this->validate($request, Board::$rules);
      $board = new Board;
      $form = $request->all();
      unset($form['_token']);
      $board->fill($form)->save();
      return redirect('/board');
    }

//withの勉強
  //モデル::with(リレーション名)->get();
    // public function index(Request $request){
    //   $items = Board::with('person')->get();
    //   return view('board.index',['items' => $items]);
    // }

}
