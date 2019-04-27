@extends('layouts.twitterapp')

@section('title','Tweet')

@section('contents')
<h1>ツイートをする</h1>
<table>
<form action="/twitter/tweet" method="post">
  {{csrf_field()}}
  <tr><th></th><th>
    <textarea type="text" name="message" class="tweettext"></textarea></td></tr>
  <tr><th></th><td><input type="submit" value="send" class="btn">
  </td></tr>
</form>
</table>
@endsection
