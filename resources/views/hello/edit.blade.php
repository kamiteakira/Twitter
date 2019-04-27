@extends('layouts.helloapp')

@section('title','Edit')

@section('menubar')
@paerent
更新ページ
@endsection

@section('content')
<table>
  <form action="/hello/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}">
    <tr><th>name:</th><td><input type="text" name='name' value="{{$form->name}}">
      </td></tr>
    <tr><th>name:</th><td><input type="text" name='mail' value="{{$form->mail}}">
      </td></tr>
    <tr><th>name:</th><td><input type="text" name='age' value="{{$form->age}}">
      </td></tr>
    <tr><th></th><td><input type="submit" value="send">
      </td></tr>
  </form>
</table>
@endsection

@section('footer')
copyright 2017 kamite.
@endsection
