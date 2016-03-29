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

        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Usage: This tool can be used to generate random users that you can use in your projects when you need dummy user info to populate your application.</div>
            </div>
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>Number of Users:</dt>
                    <dd>Specify the number of random users you want to generate. Acceptable range is from 1 to 1000.</dd>
                    <dt>Locale:</dt>
                    <dd>Choose which locale you want the users for. Currently United States and Japan are supported.</dd>
                </dl>
            </div>
        </div>

        <form method='POST' action='/rando'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            <div class="form-group">
                <label for="num_rnd_users">Number of Users:</label>
                <input type='number' class="form-control" id="num_rnd_users" name='num_rnd_users' value='{{ old('num_rnd_users') }}' placeholder="Enter a number between 1 and 1000.">
            </div>
            @if($errors->has('num_rnd_users'))
                <p><span class="label label-warning">Warning!</span> {{ $errors->first('num_rnd_users') }}</p>
            @endif

            <p class="form-label">Locale:</p>
            <label class="radio-inline">
                <input type="radio" name="country_option" id="country_option1" value="united_states" @if(old('country_option')!='japan') checked @endif >United States
            </label>
            <label class="radio-inline">
                <input type="radio" name="country_option" id="country_option2" value="japan" @if(old('country_option')=='japan') checked @endif>Japan
            </label>
            @if($errors->has('country_option'))
                <p><span class="label label-warning">Warning!</span> {{ $errors->first('country_option') }}</p>
            @endif
            <br><br>
            <button type="submit" class="btn btn-primary btn-block">Generate</button>
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