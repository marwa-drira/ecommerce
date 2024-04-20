<?php

namespace App\Http\Controllers;

use App\Models\LigneCommande;
use Illuminate\Http\Request;

class LigneCommandeController extends Controller
{
    public function index()
    {
        $lignecommandes = LigneCommande::with('commandes','articles')->get();
        return $lignecommandes;
    }
    public function store(Request $request)
    {
        $lignecommande = new LigneCommande([
            'quantitecommandee' => $request->input('quantitecommandee'),
            'totligne' => $request->input('totligne'),
            'commandeID' => $request->input('commandeID'),
            'articleID' => $request->input('articleID'),

        ]);
        $lignecommande->save();
        return response()->json($lignecommande, 201);
    }
    public function show($id)
    {
        $lignecommande = LigneCommande::find($id);
        return response()->json($lignecommande);
    }
    public function update(Request $request, $id)
    {
        $lignecommande = LigneCommande::find($id);
        $lignecommande->update($request->all());
        return response()->json($lignecommande, 200);
    }
    public function destroy($id)
    {
        $lignecommande = LigneCommande::find($id);
        $lignecommande->delete();
        return response()->json('LigneCommande supprimée !');
    }
    public function showLigneCommandeByCOM($idcom)
    {
        $lignecommande = LigneCommande::where('commandeID', $idcom)->with('commandes')->get();
        return response()->json($lignecommande);
    }
    public function showLigneCommandeByART($idart)
    {
        $lignecommande = LigneCommande::where('articleID', $idart)->with('articles')->get();
        return response()->json($lignecommande);
    }
}
