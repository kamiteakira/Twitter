@extends('layouts.twitterapp')

@section('title','MyPage')

@section('contents')
<h1>プロフィール編集</h1>
<table>
  <form action="/twitter/edit" method="post">
    {{csrf_field()}}
    <tr><th>name</th><td><input type="text" name='name' value='{{$form->name}}'>
      </td></tr>
    <tr><th>mail</th><td><input type="text" name='email' value='{{$form->email}}'>
      </td></tr>
    <tr><th></th><td><input type="submit" value="send">
      </td></tr>
  </form>
</table>
@endsection
