<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{

// localhost で入力すると...
  // public function index(Request $request){
  //   $items = DB::select('select * from people');
  //   return view('index',['items' => $items]);
  // }

//localhost/?id=1 で入力すると...
  // public function index(Request $request){
  //   if (isset($request->id)) {
  //     $param = ['id' =>$request->id];
  //     $items = DB::select('select * from people where id = :id',$param);
  //   } else {
  //     $items = DB::select('select * from people');
  //   }
  //   return view('index',['items'=>$items]);
  // }

//SQL文のデータベース管理
  // public function index(Request $request){
  //     $items = DB::select('select * from people');
  //     return view('hello.index',['items'=>$items]);
  // }
  //
  //public function post(Request $request){
  //   $items = DB::select('select * from people');
  //   return view('hello.index',['items'=>$items]);
  // }
  //
  // public function add(Request $request){
  //   return view('hello.add');
  // }
  //
  // public function create(Request $request){
  //   $param = [
  //     'name' => $request->name,
  //     'mail' => $request->mail,
  //     'age' => $request->age,
  //   ];
  //   DB::insert('insert into people (name, mail,age) values
  //   (:name,:mail,:age)',$param);
  //   return redirect('/hello');
  // }
  //
  // public function edit(Request $request){
  //   $param = ['id' => $request -> id];
  //   $item = DB::select('select * from people where id = :id',$param);
  //   return view('hello.edit',['form'=>$item[0]]);
  // }
  //
  // public function update(Request $request){
  //   $param = [
  //     'id' => $request->id,
  //     'name' => $request->name,
  //     'mail' => $request->mail,
  //     'age' => $request->age,
  //   ];
  //   DB::update('update people set name =:name, mail = :mail, age = :age where id = :id',$param);
  //   return redirect('/hello');
  // }
  //
  // public function del(Request $request){
  //   $param = ['id' => $request -> id];
  //   $item = DB::select('select * from people where id = :id',$param);
  //   return view('hello.del',['form' => $item[0]]);
  // }
  //
  // public function remove(Request $request){
  //   $param = ['id' => $request -> id];
  //   DB::delete('delete from people where id = :id',$param);
  //   return redirect('/hello');
  // }

//クエリビルダのデータベース管理
  // public function index(Request $request){
  //   $items = DB::table('people')->get();
  //   return view('hello.index',['items' => $items]);
  // }
  //    whereを使った基本文
  // public function show(Request $request){
  //   $id = $request->id;
  //   $items = DB::table('people')->where('id','<=',$id)->get();
  //   return view('hello.show',['items' => $items]);
  // }
  //
  //   like検索を使った文
  // public function show(Request $request){
  //   $name = $request->name;
  //   $items = DB::table('people')
  //   ->where('name','like','%'.$name.'%')     // like検索。その文字が含まれた条件のものを取り出す
  //   ->orWhere('mail','like','%'.$name.'%')   // フィールド like '%テキスト%'
  //   ->get();
  //   return view('hello.show',['items' => $items]);
  // }
  //
  //    最大値と最小値を設定する
  // public function show(Request $request){
  //   $min = $request->min;
  //   $max = $request->max;
  //   $items = DB::table('people')
  //   ->whereRaw('age >= ? and age <= ?',[$min, $max])->get();
  //   return view('hello.show',['items' => $items]);
  // }
  //
  //    昇順、降順に並べる
  // public function show(Request $request){
  //   $items = DB::table('people')
  //   ->orderBy('age','asc')->get();  //ascが昇順 descが降順
  //   return view('hello.show',['items' => $items]);
  // }
  //
  //    部分的に取り出す
  // public function show(Request $request){
  //   $page = $request->page;
  //   $items = DB::table('people')
  //   ->offset($page * 3)  //page=1の場合、3個目から値を取りだす
  //   ->limit(2)           //最大三つを取り出す
  //   ->get();
  //   return view('hello.show',['items' => $items]);
  // }

//値の追加
  public function add(Request $request){
    return view('hello.add');
  }

  public function create(Request $request){
    $param = [
      'name' => $request ->name,
      'mail' => $request ->mail,
      'age' => $request ->age,
    ];
    DB::table('people')->insert($param);
    return redirect('/hello');
  }
//値の更新
    // Mから値を受け取り、httpの値を確認
  public function edit(Request $request){
    $item = DB::table('people')
    ->where('id',$request->id)->first();
    return view('hello.edit',['form' => $item]);
  }
    // 変更ボタンを押した時にMに値を渡す
  public function update(Request $request){
    $param = [
      'name' => $request ->name,
      'mail' => $request ->mail,
      'age' => $request ->age,
    ];
    DB::table('people')
    ->where('id',$request->id)
    ->update($param);
    return redirect('/hello');
  }

//フィールドの削除
  //idを受け取り、DBから取り出す
public function del(Request $request){
  $item = DB::table('people')
    ->where('id',$request->id)->first();
    return view('hello.del',['form'=>$item]);
}
  //ボタンが押された時にDBからフィールドを削除する
public function remove(Request $request){
  DB::table('people')
  ->where('id',$request->id)->delete();
  return redirect('/hello');
}

public function ses_get(Request $request){
  $sesdata = $request->session()->get('msg');
  return view('hello.session',['session_data'=>$sesdata]);
}

public function ses_put(Request $request){
  $msg = $request->input;
  $request->session()->put('msg',$msg);
  return redirect('hello/session');
}

//ぺジネーション
// public function index(Request $request){
//   $items = DB::table('people')->orderBy('age','adc')->simplePaginate(5);
//   return view('hello.index',['items' => $items]);
// }
// モデル利用の場合
public function index(Request $request){
  $user = Auth::user();
  $items = Person::orderBy('age','asc')->simplePaginate(5);
  $param = ['items'=>$items,'user'=>$user];
  return view('hello.index',$param);
}

// クリックしたらそれ順になる機能
// public function index(Request $request){
//   $sort = $request->sort;
//   $items = Person::orderBy($sort,'asc')->simplePaginate(5);
//   $param = ['items'=>$items,'sort'=>$sort];
//   return view('hello.index',$param);
// }

public function getAuth(Request $requsest){
  $param = ['message' => 'ログインしてください'];
  
  return view('hello.auth',$param);
}

public function postAuth(Request $request){
  $email = $request->email;
  $password = $request->password;
  if (Auth::attempt(['email'=>$email,'password'=>$password])) {
    $msg = 'ログインしました。（' . Auth::user()->name . ')';
  } else {
    $msg = 'ログインに失敗しました。';
  }
  return view('hello.auth',['message'=>$msg]);
}

}
