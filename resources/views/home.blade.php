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

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">What's all this then?</div>
            </div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Lorem Ipsum Generator</dt>
                    <dd>This tool can be used to generate lorem ipsum text that you can use in your projects when you need bulk amounts of placeholder text. The tool allows you to specify how many paragraphs your need.</dd>
                    <dt>Random User Generator</dt>
                    <dd>This tool can be used to generate a random list of users that you can use in your projects when need dummy user information to test with. The tool allows you to specify how many users your need and currently allows you to select two locales: United States and Japan.</dd>
                </dl>
            </div>
        </div>

        <h2>Pick Your Poison:</h2>

        <a href="/lorem"><img src="images/Lorem_Ipsum_Generator_Sm.png" title="Lorem Ipsum Generator" width="296" height="40" /></a>
        <a href="/rando"><img src="images/Random_User_Generator_Logo_Sm.png" title="Random User Generator" width="296" height="40" /></a>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop