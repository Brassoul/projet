<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use App\Models\produits;
use Illuminate\Http\Request;

class commentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $produit = produits::all();
        $commentaire = commentaire::all();
        $productSelect = produits::find($id);
        $commentaires = commentaire::orderBy('created_at', 'desc')->paginate(6);
        return view('commentaire.index', compact('commentaires', 'commentaire', 'produit', "productSelect"));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(string $id)
    {
        $produit = produits::all();
        $commentaire = commentaire::all();
        $productSelect = produits::find($id);
        return view('commentaire.create', compact('commentaire', 'produit', "productSelect"));
    } //


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'mail' => 'required|max:250',
            'commentaire' => 'required|min:10',
            'produits_id' => 'required',
            'users_id' => 'required',
        ]);

        $data = $request->all();
        commentaire::create($data);
        // $id = $data['id'];
        return   redirect()->back()->with("addSuccess", "Votre commentaire a été ajouté avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commentaire = commentaire::find($id);
        return view('commentaire.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = produits::all();
        $commentaire = commentaire::find($id);
        return view('commentaire.edit', compact('commentaire', 'produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commentaire = commentaire::find($id);
        $data = $request->all();
        $commentaire->update($data);
        return   redirect()->route('commentaire.index')->with("addSuccess", "Le Produit a ete ajoute avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $commentaire = commentaire::find($id);
        $commentaire->delete();
        return   redirect()->route('commentaire.index')->with("addSuccess", "Le Produit a ete supprimer ");
    }
}
