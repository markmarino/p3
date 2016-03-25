@extends('layouts.master')


@section('title')
    Random User List
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
        <h1>Random User List</h1>
        <table class="table table-striped">
            <tr><th>Name</th><th>Phone Number</th><th>E-mail Address</th><th>Street Address</th></tr>
            @foreach($rando_users as $rando_user)
                <tr><td>{{ $rando_user['full_name'] }}</td><td>{{ $rando_user['phone'] }}</td><td>{{ $rando_user['email'] }}</td><td>{{ $rando_user['address'] }}</td></tr>
            @endforeach
        </table>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop