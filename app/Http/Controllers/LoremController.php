<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

use App\Http\Requests;

Use \Debugbar;

class LoremController extends Controller
{
    public function getIndex(Request $request)
    {
        return view('lorem.index'); // view is in /p3/resources/views/lorem/index.blade.php
    }

    public function postIndex(Request $request)
    {
        // set things up for validation via Validator
        // first set up the $input array with the form inputs
        $input = array(
            'num_paragraphs' => Input::get( 'num_paragraphs' ),
            'paragraph_length' => Input::get( 'paragraph_length' ),
            'lorem_style_option' => Input::get( 'lorem_style_option' ),
        );
        // second, define the custom error messages for each validation rule error
        $messages = array(
            'num_paragraphs.required' => 'Please specify the number of paragraphs desired.',
            'num_paragraphs.numeric' => 'Please enter numbers only.',
            'num_paragraphs.min' => 'Sorry, you must specify at least 1 paragraph to generate.',
            'num_paragraphs.max' => 'Sorry, you can only generate up to maximum of 100 paragraphs.',
            'paragraph_length.required' => 'Please specify the desired length of the paragraphs.',
            'lorem_style_option.required' => 'Please specify the desired style for the text.',

        );
        // third, define the validation rules for each form input, see validation types here:
        // https://laravel.com/docs/5.1/validation#available-validation-rules
        $rules = array(
            'num_paragraphs' => 'required|numeric|min:1|max:100',
            'paragraph_length' => 'required|in:short,medium,long',
            'lorem_style_option' => 'required|in:regular_lorem,alice_in_wonderland',
        );
        // fire off the validator
        $validator = Validator::make($input, $rules, $messages);

        // flash the current input to the session so that it is available during the user's next request to the application
        // this will allow the form data to be displayed as it was by via blade e.g. {{ old('num_paragraphs') }}
        $request->flash();

        // if validation passes, process the form input
        if($validator->passes()) {
            // grab the $request object which contains all the form data
            $data = $request->all();
            $num_paragraphs = $data['num_paragraphs'];
            $lorem_style = $data['lorem_style_option'];
            $paragraph_length = $data['paragraph_length'];
            Debugbar::addMessage('$num_paragraphs:', $num_paragraphs);
            // dd($data);

            $faker = FakerFactory::create();

            //Debugbar::addMessage('Faker Lorem:', $faker->paragraph(5,true));
            //Debugbar::addMessage('Faker Real Text:', $faker->realText(500));

            $lorem_paragraphs = array();

            if ($paragraph_length == 'short') {
                $num_sentences = 6;
                $num_characters = 300;
            } else if ($paragraph_length == 'medium') {
                $num_sentences = 12;
                $num_characters = 600;
            } else if ($paragraph_length == 'long') {
                $num_sentences = 18;
                $num_characters = 900;
            }

            for ($i=0; $i < $num_paragraphs; $i++) {
                if ($lorem_style == 'regular_lorem') {
                    $paragraph = $faker->paragraph($num_sentences,true);
                } else if ($lorem_style == 'alice_in_wonderland') {
                    $paragraph = $faker->realText($num_characters);
                }

                $lorem_paragraphs[] = array(
                    'lorem_text' => $paragraph,
                );
            }
            //dd($lorem_paragraphs);
            $input = $request->all();
            return view('lorem.index', ['lorem_paragraphs' => $lorem_paragraphs, 'input' => $input]);
        } else {

            // validation failed, redirect to the rando view and pass the errors array for display
            $errors = $validator->errors();
            // output the $errors object form data to the page
            //dd($errors->all());

            return Redirect::to('lorem')
                ->withInput()
                ->withErrors($errors);
        }
    }
}
