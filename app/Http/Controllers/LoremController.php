<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

use App\Http\Requests;

class LoremController extends Controller
{
    public function getIndex()
    {
        return view('lorem.index');
    }

    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'num_paragraphs' => 'required|digits_between:1,3|min:1',
        ]);
        // output the request object form data to the page
        //dd($request->all());
        return 'Process the ipsum lorem index';
    }
}
