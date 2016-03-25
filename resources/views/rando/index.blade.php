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
        <h1>Generate Random Users:</h1>
        <form method='POST' action='/rando'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            <div class="form-group">
                <label for="num_rnd_users">Number of Random Users</label>
                <input type='number' class="form-control" id="num_rnd_users" name='num_rnd_users' value='{{ $input['num_rnd_users'] or old('num_rnd_users') }}'>
            </div>
            @if(count($errors) > 0)
                <div class="well well-sm"><p><span class="label label-warning">Warning!</span> {{ $errors->first('num_rnd_users') }}</p></div>
            @endif

            <h3>Choose a country:</h3>
            <div class="radio-inline">
              <label>
                <input type="radio" name="country_option" id="country_option1" value="united_states" @if(old('country_option')=='united_states') checked @endif >
                United States
              </label>
            </div>

            <div class="radio-inline">
              <label>
                <input type="radio" name="country_option" id="country_option2" value="japan" @if(old('country_option')=='japan') checked @endif>
                Japan
              </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>
        <br><br><br>

        @if(isset($rando_users))
                <div class="container">
                <h1>Random User List</h1>
                <table class="table table-striped">
                    <tr><th>Name</th><th>Phone Number</th><th>E-mail Address</th><th>Street Address</th></tr>
                    @foreach($rando_users as $rando_user)
                        <tr><td>{{ $rando_user['full_name'] }}</td><td>{{ $rando_user['phone'] }}</td><td>{{ $rando_user['email'] }}</td><td>{{ $rando_user['address'] }}</td></tr>
                    @endforeach
                </table>
            </div>
        @endif

    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop