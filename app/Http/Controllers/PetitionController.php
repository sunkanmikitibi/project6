<?php

namespace App\Http\Controllers;

use App\Petition;
use App\Petitioncategory;
use App\Signature;
use Illuminate\Http\Request;
use Image;
use Session;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Petitioncategory::all();
        $petitions = Petition::latest()->paginate(10);
        return view('petition.index', compact('categories', 'petitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Petitioncategory::find($id);
        return view('petition.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'title'=>'required',
                'purpose' =>'required',
                'petitioncategory_id'=>'required',
            ]
            );

            //dd(request()->all());
            $image = $request->file('petition_image');
            $input['picturename'] = time().'.'.$image->extension();
            $destinationPath = public_path('/imgs/petitions');
            $img = Image::make($image->path());
            $img->resize(738, 350)->save($destinationPath .'/'. $input['picturename']);
            $data['petition_image'] = $input['picturename'];

            $petition = auth()->user()->petitions()->create($data);
            return redirect()->route('petition.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function show(Petition $petition)
    {
        $signatures = Signature::all();
        return view('petition.show', compact('petition', 'signatures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function edit(Petition $petition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petition $petition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petition $petition)
    {
        //
    }
}
