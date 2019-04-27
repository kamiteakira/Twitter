@extends('layouts.twitterapp')

@section('title','Twitter')

@section('contents')
<h1>TimeLine</h1>
  @foreach($items as $item)
  <div class="tweet">
    <pre><p class="tweetmessage">{{$item->getData()}}</p></pre>
    <p>{{$item->getName()}}</p>
    <p class="tweettime">{{$item->getTime()}}</p>
  </div>
  @endforeach
@endsection
