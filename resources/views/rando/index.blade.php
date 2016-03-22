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
        <img
        src='http://p3.loc/images/Random_User_Generator_Logo_Sm.png'
        style='width:594px'
        alt='Random User Generator'>
@stop

@section('content')
        <h1>Generate Random Users</h1>
        <form method='POST' action='/rando'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            Number of Random Users: <input type='text' name='num_rnd_users' value='{{old('num_rnd_users')}}'>
            @if(count($errors) > 0)
                <div class='errors'>
                    <p>Oops, please correct the errors below and try again:</p>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        @foreach ($errors->get('num_rnd_users') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        <li>{{ $errors->first('num_rnd_users') }}</li>
                    </ul>
                </div>
            @endif
            <input type='submit' value='Generate Random Users'>
        </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop