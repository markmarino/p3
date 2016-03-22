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

class RandoController extends Controller
{
    public function getIndex()
    {
        Debugbar::error('Error!');
        return view('rando.index');
    }

    public function postIndex(Request $request)
    {
        Debugbar::addMessage('Another message', 'mylabel');
        $input = array(
            'num_rnd_users' => Input::get( 'num_rnd_users' )
        );
        $messages = array(
            'num_rnd_users.required' => 'Please specify the number of random users requested.',
            'num_rnd_users.numeric' => 'Please enter a number in the Number of Random Users field.',
            'num_rnd_users.min' => 'Sorry, you must specify at least 1 user to generate.',
            'num_rnd_users.max' => 'Sorry, you can only generate up to maximum of 1000 users.'
        );
        $rules = array(
            'num_rnd_users' => 'required|numeric|min:1|max:1000'
        );
        $validator = Validator::make($input, $rules, $messages);

        /*
        if ( $validator->fails() ) {
            $errors = $validator->messages();
        }
        */

        // output the $errors object form data to the page
        //dd($errors->all());
        //display errors
        Debugbar::error('Error!');
        Debugbar::addMessage('Another message', 'mylabel');
        if($validator->passes()) {
            // use the factory to create a Faker\Generator instance
            $faker = FakerFactory::create();
            \Debugbar::info($faker->name);
            //return Redirect::to('rando')->withInput();
        } else {
            $errors = $validator->errors();

            return Redirect::to('rando')
                ->withInput()
                ->withErrors($errors);
        }

        /*
        if ( ! empty( $errors ) ) {

            foreach ( $errors->all() as $error ) {
                    echo '<div class="error">' . $error . '</div>';
            }

            return 'Process the rando index';
        } else {
            // require the Faker autoloader
            //require_once '/path/to/Faker/src/autoload.php';

            // use the factory to create a Faker\Generator instance
            $faker = FakerFactory::create();

            // generate data by accessing properties
            echo $faker->name.'<br>';
        }
        */

        /* simple validation method, replaced by more robust validation above
        $this->validate($request, [
            'num_rnd_users' => 'required|digits_between:1,3',
        ]);
        */

        // output the request object form data to the page
        //dd($request->all());

        //return 'Process the rando index';
    }
}
