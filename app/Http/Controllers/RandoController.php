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
        return view('rando.index'); // view is in /p3/resources/views/rando/index.blade.php
    }

    public function postIndex(Request $request)
    {
        // set things up for validation via Validator
        // first set up the $input array with the form inputs
        $input = array(
            'num_rnd_users' => Input::get( 'num_rnd_users' )
        );
        // second, define the custom error messages for each validation rule error
        $messages = array(
            'num_rnd_users.required' => 'Please specify the number of random users requested.',
            'num_rnd_users.numeric' => 'Please enter a number in the Number of Random Users field.',
            'num_rnd_users.min' => 'Sorry, you must specify at least 1 user to generate.',
            'num_rnd_users.max' => 'Sorry, you can only generate up to maximum of 1000 users.'
        );
        // third, define the validation rules for each form input, see validation types here:
        // https://laravel.com/docs/5.1/validation#available-validation-rules
        $rules = array(
            'num_rnd_users' => 'required|numeric|min:1|max:1000'
        );
        // fire off the validator
        $validator = Validator::make($input, $rules, $messages);

        // if validation passes, process the form input
        if($validator->passes()) {
            // grab the $request object which contains all the form data
            $data = $request->all();
            $num_rnd_users = $data['num_rnd_users'];
            // use the factory to create a Faker\Generator instance
            $faker = FakerFactory::create();
            //Debugbar::addMessage('Faker Lorem:', $faker->paragraph(5,true));
            //Debugbar::addMessage('Faker Real Text:', $faker->realText(500));
            /*
            if ($faker->boolean(50)) {
                $coin_toss = "Heads";
            } else {
                //false
                $coin_toss = "Tails";
            }
            Debugbar::addMessage('Random Coin Toss:', $coin_toss);
            */

            //dd($faker->name);
            //return Redirect::to('rando')->withInput();
            $rando_users = array();
            for ($i=0; $i < $num_rnd_users; $i++) {
                $full_name = $faker->name;
                $address = $faker->address;
                $phone = $faker->phoneNumber;
                $email = $faker->email;
                //echo $full_name . "\n";
                $rando_users[] = array(
                    'full_name' => $full_name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                );
            }
            //dd($rando_users);
            //return view('rando.postindex')->with(['rando_users' => $rando_users]); // /p3/resources/views/rando/postindex.blade.php
            //return view('rando', ['rando_users' => $rando_users, 'todays_date' => $todays_date, 'otherstuff' => $otherstuff]);
            //return view('rando.index', ['rando_users' => $rando_users]);
            //return view('rando.index')->with('rando_users',$rando_users);
            $input = $request->all();
            return view('rando.index', ['rando_users' => $rando_users, 'input' => $input]);
        } else {
            // validation failed, redirect to the rando view and pass the errors array for display
            $errors = $validator->errors();
            // output the $errors object form data to the page
            //dd($errors->all());

            return Redirect::to('rando')
                ->withInput()
                ->withErrors($errors);
        }

        // output the request object form data to the page
        //dd($request->all());

        //return 'Process the rando index';
    }
}
