@extends('layouts.twitterapp')

@section('title','MyPage')

@section('contents')
<h1>プロフィール</h1>
<table>
  <form action="/twitter/" method="post">
    <tr><th>name</th><td>{{$data->name}}
      </td></tr>
    <tr><th>mail</th><td>{{$data->email}}
      </td></tr>
    <tr><th></th><td><a href="/twitter/edit">プロフィールを編集</a>
      </td></tr>
  </form>
</table>
@endsection

@section('contents_sub1')
<div class="content">
  <h1>フォロー</h1>
</div>
@endsection

@section('contents_sub2')
<div class="content">
  <h1>フォロワー</h1>
</div>
@endsection
