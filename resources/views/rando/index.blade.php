@extends('layouts.master')


@section('title')
    Generate Random Users
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop

@section('header')
    <img src='http://p3.loc/images/Random_User_Generator_Logo_Sm.png' style='width:594px' alt='Random User Generator'>
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Random User Generator</li>
      <li><a href="/lorem">Lorem Ipsum Generator</a></li>
    </ol>
@stop

@section('content')
    <div class="container">
        <h1>Generate Random Users</h1>
        <form method='POST' action='/rando'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            <div class="form-group">

                <label for="num_rnd_users">Number of Random Users</label>
                <input type='text' class="form-control" id="num_rnd_users" name='num_rnd_users' value='{{old('num_rnd_users')}}'>

            </div>
            @if(count($errors) > 0)
                <div class='errors'>
                    <p>{{ $errors->first('num_rnd_users') }}</p>
                </div>
            @endif
            <button type="submit" class="btn btn-default">Generate</button>
        </form>
        <br><br><br>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop