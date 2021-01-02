<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','comments');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offer.index')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required']
        ]);

        $offer = new Offer;
        $offer->name = $request->input('name');
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->input('description');
        $offer->save();
        return redirect('/offers/'.$offer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $offer = Offer::find($id);
        return view('offer.detail')->with('offer', $offer);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
            return view('offer.edit')->with('offer', $offer);
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required']
        ]);
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->update($request->all());
        return redirect('/offers/'.$offer->id);
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        if($offer->user_id == auth()->user()->id){
        $offer->delete();
        return redirect('/');
        }
        else{
            return redirect('https://www.youtube.com/watch?v=73T5NVNb7lE');
            }
    }
    public function comments($id){
        $comments = Offer::find($id)->comments;
        return view('comment.list')->with('comments', $comments);
    }
}