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
        <img
        src='http://p3.loc/images/Lorem_Ipsum_Generator_Sm.png'
        style='width:594px'
        alt='Lorem Ipsum Generator'>
@stop


@section('content')
        <h1>Generate Ipsum Lorem Text</h1>
        <form method='POST' action='/lorem'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            Number of Paragraphs: <input type='text' name='num_paragraphs' value='{{old('num_paragraphs')}}'>
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type='submit' value='Generate Text'>
        </form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop