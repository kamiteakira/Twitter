@extends('layouts.twitterapp')

@section('title','Twitter.Add')

@section('contents')
<h1>新規登録</h1>
<form action='/twitter/add' method="post">
<table>
  {{ csrf_field() }}
  <tr><th>Name</th><th><input type="text" name="name">
  </th></tr>
  <tr><th>Mail</th><th><input type="text" name="email">
  </th></tr>
  <tr><th>Password</th><th><input type="password" name="password">
  </th></tr>
  <tr><th></th><th><input type="submit" value="登録" class="btn">
  </th></tr>
</table>
</form>
@endsection
