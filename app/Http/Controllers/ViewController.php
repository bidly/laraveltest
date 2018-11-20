<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;
class ViewController extends Controller
{
    public function home(){
        $films = Films::all();
        return view('home', ['films' => $films]);
    }

    public function add(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre' => 'required',
        ]);

        $films = new Films;
        $films ->name = $request->input('name');
        $films ->slug = str_slug($request->input('name'), '-');
        $films->description = $request->input('description');
        $films->release_date = $request->input('release_date');
        $films->rating = $request->input('rating');
        $films->ticket_price = $request->input('ticket_price');
        $films->country = $request->input('country');
        $fin = '';
        foreach ($request->input('genre') as $genre)
        {
            $fin = $fin . ' ' . $genre;
        }

        $films->genre = $fin;

        $films->save();
        return redirect('/')->with('info', 'Article Saved Successfully');

        return 'Validation Pass';
    }
}
