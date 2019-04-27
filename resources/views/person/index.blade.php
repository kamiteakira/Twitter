@extends('layouts.helloapp')

@section('title','Person/Index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<table>
  <tr>
    <th>Person</th><th>Boards</th>
  </tr>
  @foreach($hasItems as $item)
  <tr>
    <td>{{$item->getData()}}</td>
    <td>
      <table width="100%">
        @foreach ($item ->boards as $obj)
        <tr>
          <td>{{$obj->getData()}}</td>
        </tr>
        @endforeach
      </table>
    </td>
  </tr>
  @endforeach
</table>
<div style="margin:10px"></div>
<table>
  <tr>
    <th>Person</th>
  </tr>
  @foreach($noItems as $item)
  <tr>
    <td>{{$item->getData()}}</td>
  </tr>
  @endforeach
</table>
@endsection

@section('footer')
copyright 2019 kamite.
@endsection
