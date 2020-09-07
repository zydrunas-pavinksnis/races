<?php

namespace App\Http\Controllers;

use App\Horse;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    
    public function index() {
        return view('horses.index', ['horses' => Horse::orderBy('name')->get()]);
    }

    public function create() {
        return view('horses.create');
    }

    public function store(Request $request) {
        $horse = new Horse();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horse.index');
    }

    public function edit(Horse $horse){
        return view('horses.edit', ['horse' => $horse]);
    }

    public function update(Request $request, Horse $horse){
        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horse.index');
    }

    public function destroy(Horse $horse){
        $horse->delete();
        return redirect()->route('horse.index');
    }
}
