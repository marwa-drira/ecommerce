<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return $clients;
    }
    public function store(Request $request)
    {
        $client = new Client([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adress' => $request->input('adress'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => $request->input('role')
        ]);
        $client->save();
        return response()->json($client, 200);
    }
    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }
    public function update($id, Request $request)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return response()->json($client, 201);
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json('Client supprimé !');
    }
}
