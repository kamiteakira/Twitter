<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    // public function index(Request $request){
    //   $items = Person::all();
    //   return view('person.index',['items' => $items]);
    // }

    public function find(Request $request){
      return view('person.find',['input'=>'']);
    }

//find メソッドでプライマリーキーで探す
    // public function search(Request $request){
    //   $item = Person::find($request->input);
    //   $param = ['input' => $request ->input, 'item' => $item];
    //   return view ('person.find',$param);
    // }

//whereで複数のレコードを得て、firstで一つを取り出す
    // public function search(Request $request){
    //   $item = Person::where('name',$request->input)->first();
    //   $param = ['input' => $request ->input, 'item' => $item];
    //   return view ('person.find',$param);
    // }

//スコープ検索をする
  // public function search(Request $request){
  //   $item = Person::nameEquel($request->input)->first(); // nameEquelで検索する
  //   $param = ['input' => $request -> input, 'item' => $item];
  //   return view('parson.find',$param);
  // }

    public function search(Request $request){
      $min = $request->input * 1;
      $max = $min + 10;
      $item = Person::ageGreaterThan($min)->
        ageLessThan($max)->first();
      $param = ['input' => $request->input, 'item' => $item];
      return view('person.find',$param);
    }

    public function add(Request $request){
      return view('person.add');
    }

    public function create(Request $request){
      $this->validate($request, Person::$rules); //バリデージョンの実行

      $person = new Person;   //Personインスタンスの作成
      $form = $request->all();    //値を用意する _tokenだけ削除する
      unset($form['_token']);   //_tokenはCSRF用非表示フィールド
      $person->fill($form)->save();   //fillを使うことで全てを設定 save()で保存
    //↑これを一つ一つ設定してもいい
    // $person = new Person;
    // $person ->name = $request->name;
    // $person ->mail = $request->mail;
    // $person ->age = $request->age;
    // $person ->save();
//全体の動きとして、値を設定して、saveするという動きは変わらない
      return redirect('/person');
    }

    public function edit(Request $request){
      $person = Person::find($request->id);
      return view('person.edit',['form'=>$person]);
    }

    public function update(Request $request){
      $this->validate($request, Person::$rules); //変なこと書いてないか、バリデージョンで確認 $requestと$rulesを見ている
      $person = Person::find($request->id);   //findで値を探して、指定されたidの値を取り出し、personに代入
      $form = $request->all();
      unset($form['_token']);
      $person->fill($form)->save();
      return redirect('/person');
    }

    public function delete(Request $request){
      $person = Person::find($request->id);
      return view('person.del',['form' => $person]);
    }

    public function remove(Request $request){
      Person::find($request->id)->delete();
      return redirect('/person');
    }

//リレーションの勉強
  //has doesntHave で、Boradモデルと関連性のあるpersonを取り出すことができる
    public function index(Request $request){
      $hasItems = Person::has('boards')->get(); //モデル::has('リレーション名')->get();
      $noItems = Person::doesntHave('boards')->get(); //モデル::doesntHave('リレーション名')->get();
      $param = ['hasItems'=>$hasItems,'noItems'=>$noItems];
      return view('person.index',$param);
    }

}
