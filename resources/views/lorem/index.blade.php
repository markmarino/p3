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
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            <div class="form-group">
                <label for="num_paragraphs">Number of Paragraphs</label>
                <input type='number' class="form-control" id="num_paragraphs" name='num_paragraphs' value='{{ old('num_paragraphs') }}' placeholder="Enter a number between 1 and 100.">
            </div>
            @if($errors->has('num_paragraphs'))
                <p><span class="label label-warning">Warning!</span> {{ $errors->first('num_paragraphs') }}</p>
            @endif

            <h4>Choose an paragraph length:</h4>

              <label class="radio-inline">
                <input type="radio" name="paragraph_length" id="paragraph_length1" value="short" @if(old('paragraph_length')=='short') checked @endif >
                Short
              </label>

              <label class="radio-inline">
                <input type="radio" name="paragraph_length" id="paragraph_length2" value="medium" @if(old('paragraph_length')=='medium') checked @endif>
                Medium
              </label>

              <label class="radio-inline">
                <input type="radio" name="paragraph_length" id="paragraph_length3" value="long" @if(old('paragraph_length')=='long') checked @endif>
                Long
              </label>

            @if($errors->has('paragraph_length'))
                <p><span class="label label-warning">Warning!</span> {{ $errors->first('paragraph_length') }}</p>
            @endif

            <h4>Choose a style:</h4>
              <label class="radio-inline">
                <input type="radio" name="lorem_style_option" id="lorem_style_option1" value="regular_lorem" @if(old('lorem_style_option')=='regular_lorem') checked @endif >
                Regular Lorem Ipsum Style
              </label>

              <label class="radio-inline">
                <input type="radio" name="lorem_style_option" id="lorem_style_option2" value="alice_in_wonderland" @if(old('lorem_style_option')=='alice_in_wonderland') checked @endif>
                Alice in Wonderland Style
              </label>

            @if($errors->has('lorem_style_option'))
                <p><span class="label label-warning">Warning!</span> {{ $errors->first('lorem_style_option') }}</p>
            @endif

            <br><br>
            <button type="submit" class="btn btn-primary btn-block">Generate</button>
        </form>
        <br><br><br>

        @if(isset($lorem_paragraphs))
            <div class="container">
                <h1>Lorem Ipsum Generated Text</h1>
                <div class="well well-lg">
                    @foreach($lorem_paragraphs as $lorem_paragraph)
                        <p>{{ $lorem_paragraph['lorem_text'] }}</p>
                    @endforeach
                </div>
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