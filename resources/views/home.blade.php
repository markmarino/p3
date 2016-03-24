@extends('layouts.master')


@section('title')
    Developer&#39;s Best Friend
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop

@section('header')
    <img src='/images/Developer_Best_Friend_Logo_Sm.png' style='width:594px' alt='Developer&#39;s Best Friend'>
    <ol class="breadcrumb">
      <li class="active">Home</li>
      <li><a href="/rando">Random User Generator</a></li>
      <li><a href="/lorem">Lorem Ipsum Generator</a></li>
    </ol>
@stop


@section('content')
    <div class="container">
        <h1>Pick Your Poison:</h1>
        <a href="/lorem"><img src="images/Lorem_Ipsum_Generator_Sm.png" title="Lorem Ipsum Generator" width="594" height="80" /></a>
        <a href="/rando"><img src="images/Random_User_Generator_Logo_Sm.png" title="Random User Generator" width="594" height="80" /></a>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop