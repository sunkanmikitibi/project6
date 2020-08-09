<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Department;
use Illuminate\Http\Request;
use Image;
use Session;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('doctor.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate(
            [
                'firstname' => 'required|string',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'username' => 'required',
                'password' => 'required',
                'dateofbirth' => 'required|date',
                'department_id' => 'required|integer',
                'gender'=>'required|string',
                'doctor_image'=>'required',
            ]
            );

            $image = $request->file('doctor_image');
            $input['picturename'] = time().'.'.$image->extension();
            $destinationPath = public_path('/imgs/doctors');
            $img = Image::make($image->path());
            $img->resize(300, 300)->save($destinationPath .'/'. $input['picturename']);
            $data['doctor_image'] = $input['picturename'];

            $data['password'] = Hash::make($request->password);

            $doctor = Doctor::create($data);
            return redirect()->route('doctor.index')->with('success', 'Doctor Created!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
