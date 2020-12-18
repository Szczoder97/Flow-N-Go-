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

       $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required']
        ]);

        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->input('description');
        $offer->save();
        
    }
    public function edit($id){
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
            return view('offer.edit')->with('offer', $offer);
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
        }
        
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required']
        ]);
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->update($request->all());
        return $offer;
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
        }
    }
    public function destroy($id){
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->delete();
        return 'succes';
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
        }
    }
}