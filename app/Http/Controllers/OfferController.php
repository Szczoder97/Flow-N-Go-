<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    public function index(){
        $offers = Offer::all();
        return view('offer.index')->with('offers', $offers);
    }

    public function show($id){
        $offer = Offer::find($id);
        return view('offer.detail')->with('offer', $offer);
    }

    public function create(){
        return view('offer.create');
    }

    public function store(Request $request){

       /* $validated = $request->validate([
            'name' => ['required', 'unique', 'max:255'],
            'description' => ['reqired']
        ]);*/

        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->input('description');
        $offer->save();
        
    }
    public function edit($id){
        $offer = Offer::find($id);
        return view('offer.edit')->with('offer', $offer);
    }

    public function update(Request $request, $id){
        $offer = Offer::find($id);
        $offer->name = $request->input('name');
        $offer->description = $request->input('description');
        $offer->save();
        return redirect()->back();
    }
    public function delete(){

    }
}