<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Session;
use App\Mail\ClientRegister;
use Illuminate\Support\Facades\Mail;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:clients,email',
                'phone' =>'required',
            ]
        );

        $clients = Client::create($data);
        Mail::to($request->email)->send(new ClientRegister($data));
        return redirect()->route('admin.clients')->with('success', 'Clients Added Successfully');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update($id, Request $request)
    {
        $data = request()->validate(
            [
                'firstname' => 'sometimes',
                'lastname' => 'sometimes',
                'email' => 'sometimes',
                'phone' => 'sometimes',
            ]
        );

        $client = Client::find($id);
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->phone;

        $client->save();

        return redirect()->route('admin.clients')->with('success', 'Client Updated Successfully!!');
    }

    public function destroy(Client $client)
    {

        $client->delete();
        return redirect()->route('admin.clients')->with('success', 'Deleted Successfully!!!');
    }
}
