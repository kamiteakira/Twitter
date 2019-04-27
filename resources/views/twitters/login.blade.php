@extends('layouts.twitterapp')

@section('title','Twitter.Login')

@section('contents')

@if( Auth::check() )
<h1>すでにログイン済みです</h1>
@else
<a href="/twitter/add">まだ登録していない方はこちら</a>
<h1>{{$message}}</h1>
<table>
  <form action="/twitter/login" method="post">
    {{csrf_field()}}
    <tr><th>mail</th><td><input type="text" name='email'>
      </td></tr>
    <tr><th>password</th><td><input type="password" name='password'>
      </td></tr>
    <tr><th></th><td><input type="submit" value="send">
      </td></tr>
  </form>
</table>
@endif

@endsection
