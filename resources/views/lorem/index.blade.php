@extends('layouts.master')


@section('title')
    Generate Ipsum Lorem Text
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop

@section('header')
    <img src='http://p3.loc/images/Lorem_Ipsum_Generator_Sm.png' style='width:594px' alt='Lorem Ipsum Generator'>
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="/rando">Random User Generator</a></li>
      <li class="active">Lorem Ipsum Generator</li>
    </ol>
@stop


@section('content')
    <div class="container">
        <h1>Generate Ipsum Lorem Text</h1>
        <form method='POST' action='/lorem'>
            <div class="form-group">
                <input type='hidden' name='_token' value='{{csrf_token()}}'>
                <label for="num_paragraphs">Number of Paragraphs</label>
                <input type='text' class="form-control" id="num_paragraphs" name='num_paragraphs' value='{{old('num_paragraphs')}}'>
            </div>
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <button type="submit" class="btn btn-default">Generate</button>
        </form>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop