<?php

namespace App\Http\Controllers;

use App\Bidder;
use Illuminate\Http\Request;

class BidderController extends Controller {

    public function index(Request $request){
        // var_dump($request->all()); die();
        if(isset($request->horse_id) && $request->horse_id !==0){
            $bidders = \App\Bidder::where('horse_id', $request->horse_id)->orderBy('name')->get();
        } else {
            $bidders = \App\Bidder::orderBy('name')->get();
        }
        
        return view('bidders.index', ['bidders' => $bidders, 'horses' => \App\Horse::orderBy('name')->get()]);    }

    public function create(){
        $horses = \App\Horse::orderBy('name')->get();
        return view('bidders.create', ['horses' => $horses]);
    }

    public function store(Request $request){
        $bidder = new Bidder();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $bidder->fill($request->all());
        $bidder->save();
        return redirect()->route('bidder.index');
    }

    public function show(Bidder $bidder){
    //
    }

    public function edit(Bidder $bidder){
        $horses = \App\Horse::orderBy('name')->get();
        return view('bidders.edit', ['bidder' => $bidder, 'horses' => $horses]);
    }

    public function update(Request $request, Bidder $bidder){
        $bidder->fill($request->all());
        $bidder->save();
        return redirect()->route('bidder.index');
    }

    public function destroy(Bidder $bidder){
        $bidder->delete();
        return redirect()->route('bidder.index');
    }
}