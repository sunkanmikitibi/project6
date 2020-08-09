<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Petitioncategory;

class PetitioncategoryController extends Controller
{
    //
    public function store(CategoryRequest $request)
    {
        $category = Petitioncategory::create($request->all());
        return redirect()->route('petition.index')->with('success', 'Category Added Successfully');
    }

    public function show(Petitioncategory $category)
    {
        return view('petition.petitionlist', compact('category'));
    }
}
