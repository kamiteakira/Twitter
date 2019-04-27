<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TwitterController extends Controller
{

//タイムライン
    public function home(Request $request){
      if(Auth::check()){
          return view('twitters.home');
      }else{
          $request->session()->flash("msg","ログインが必要です");
          return redirect()->action('TwitterController@getAuth');
        }
    }

// 新規登録
    public function add(Request $request){
      return view('twitters.add');
    }
//登録をDBに入れるためのやつ
    public function create(Request $request){
//受け取ったら合っているかの確認
    $this->validate($request,[
      'name' => 'required',
      'email' => 'email|required|unique:users',
      'password' => 'required|min:4',
    ]);
//DBに入れる
    $user = new User([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
    ]);
    $user->save();
    return redirect('/twitter/login');
    }

//ユーザー認証
    public function getAuth(Request $request){
      if( \Session::has('msg') ){
        $param = ['message' => \Session::get('msg')];
      }else{
        $param = ['message' => 'ログイン画面'];
      }
      return view('twitters.login',$param);
    }
//ユーザー認証
    public function postAuth(Request $request){
      $email = $request->email;
      $password = $request->password;
      if (Auth::attempt(['email'=>$email,'password'=>$password])){
        $msg = 'ログインしました。('.Auth::user()->name .')';
      } else {
        $msg = 'ログインに失敗しました';
      }
      return view('twitters.login',['message'=>$msg]);
    }
    public function getLogout(){
      Auth::logout();
      return redirect('/twitter/login');
    }

//ユーザー一覧を表示
    public function friends(Request $request){
      if(Auth::check()){
        $data = User::all();
        return view('twitters.friends',['datas'=>$data]);
    }else {
      $request->session()->flash("msg","ログインが必要です");
      return redirect()->action('TwitterController@getAuth');
      }
    }


// プロフィール編集と更新
    public function mypage(Request $request){
      if(Auth::check()){
        $data = Auth::user();
          return view('twitters.mypage',['data'=>$data]);
      }else{
          $request->session()->flash("msg","ログインが必要です");
          return redirect()->action('TwitterController@getAuth');
      }
    }
    public function edit(Request $request){
      $data = Auth::user();
      return view('twitters.edit',['form'=>$data]);
    }
    public function update(Request $request){
      $this->validate($request,[
        'name' => 'required',
        'email' => 'email|required|unique:users',]);//変なこと書いてないか、バリデージョンで確認
      $user = Auth::user();   //findで値を探して、指定されたidの値を取り出し、personに代入
      $form = $request->all();
      unset($form['_token']);
      $user->fill($form)->save();
      return redirect('/twitter/mypage');
    }

}
