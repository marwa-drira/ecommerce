<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('clients')->get();
        return $commandes;
    }
    public function store(Request $request)
    {
        $commande = new Commande([
            'total' => $request->input('total'),
            'dateCommande' => $request->input('dateCommande'),
            'clientID' => $request->input('clientID'),
        ]);
        $commande->save();
        return response()->json($commande, 201);
    }
    public function show($id)
    {
        $commande = Commande::find($id);
        return response()->json($commande);
    }
    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);
        $commande->update($request->all());
        return response()->json($commande, 200);
    }
    public function destroy($id)
    {
        $commande = Commande::find($id);
        $commande->delete();
        return response()->json('Commande supprimée !');
    }
    public function showCommandeByCLI($idcli)
    {
        $commande = Commande::where('clientID', $idcli)->with('clients')->get();
        return response()->json($commande);
    }
}
