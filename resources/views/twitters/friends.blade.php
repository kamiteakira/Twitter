@extends('layouts.twitterapp')

@section('title','Friends')

@section('contents')
<h1>ユーザー一覧</h1>
<table>
  <tr>
    <th>name</th>
    <th>mail</th>
  </tr>
  @foreach($datas as $data)
  @if($data->name != Auth::user()->name)
  <tr>
    <form>
      <td class="name">{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td class="followbutton"><input type="submit" value="Follow"></td>
    </form>
  </tr>
  @endif
  @endforeach
</table>

@endsection
